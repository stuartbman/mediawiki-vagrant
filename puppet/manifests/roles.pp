# == Roles for Mediawiki-Vagrant
#
# A 'role' represents a set of software configurations required for
# giving this machine some special function. If you'd like to use the
# Vagrant-Mediawiki codebase to describe a development environment that
# you could then share with other developers, you should do so by adding
# a role below and submitting it as a patch to the Mediawiki-Vagrant
# project.
#
# To enable a particular role on your instance, include it in the
# mediawiki-vagrant node definition in 'site.pp'.
#


# == Class: role::generic
# Configures common tools and shell enhancements.
class role::generic {
	class { 'apt':
		stage => first,
	}
	class { 'misc': }
	class { 'git': }
}

# == Class: role::mediawiki
# Provisions a MediaWiki instance powered by PHP, MySQL, and memcached.
class role::mediawiki {
	include role::generic

	$wiki_name = 'devwiki'
	$server_url = 'http://127.0.0.1:8080'
	$dir = '/vagrant/mediawiki'

	# Database access
	$db_name = 'wiki'
	$db_user = 'root'
	$db_pass = 'vagrant'

	# Initial admin account
	$admin_user = 'admin'
	$admin_pass = 'vagrant'

	class { '::memcached': }

	class { '::mysql':
		default_db_name => $db_name,
		root_password   => $db_pass,
	}

	class { '::mediawiki':
		wiki_name  => $wiki_name,
		admin_user => $admin_user,
		admin_pass => $admin_pass,
		db_name    => $db_name,
		db_pass    => $db_pass,
		db_user    => $db_user,
		dir        => $dir,
		server_url => $server_url,
	}

}

# == Class: role::eventlogging
# This role sets up the EventLogging extension for MediaWiki such that
# events are validated against production schemas but logged locally.
class role::eventlogging {
	include role::mediawiki

	mediawiki::extension { 'EventLogging':
		priority => 5,
		settings => {
			# Work with production schemas but log locally:
			wgEventLoggingBaseUri        => 'http://localhost:8100/event.gif',
			wgEventLoggingFile           => '/vagrant/logs/eventlogging.log',
			wgEventLoggingSchemaIndexUri => 'http://meta.wikimedia.org/w/index.php',
			wgEventLoggingDBname         => 'metawiki',
		}
	}
}

# == Class: role::mobilefrontend
# Configures MobileFrontend, the MediaWiki extension which powers
# Wikimedia mobile sites.
class role::mobilefrontend {
	include role::mediawiki
	include role::eventlogging

	mediawiki::extension { 'MobileFrontend':
		settings => {
			wgMFForceSecureLogin => false,
			wgMFLogEvents        => true,
		}
	}
}

# == Class: role::gettingstarted
# Configures the GettingStarted extension and its dependency, redis.
class role::gettingstarted {
	include role::mediawiki
	include role::eventlogging

	class { 'redis': }

	mediawiki::extension { 'GettingStarted':
		settings => {
			wgGettingStartedRedis => '127.0.0.1',
		},
	}
}

# == Class: role::echo
# Configures Echo, a MediaWiki notification framework.
class role::echo {
	include role::mediawiki
	include role::eventlogging

	mediawiki::extension { 'Echo':
		needs_update => true,
		settings     => {
			wgEchoEnableEmailBatch => false,
		},
	}
}

# == Class: role::visualeditor
# Provisions the VisualEditor extension, backed by a local
# Parsoid instance.
class role::visualeditor {
	include role::mediawiki

	class { '::mediawiki::parsoid': }
	mediawiki::extension { 'VisualEditor':
		settings => template('ve-config.php.erb'),
	}
}

# == Class: role::browsertests
# Configures this machine to run the Wikimedia Foundation's set of
# Selenium browser tests for MediaWiki instances.
class role::browsertests {
	include role::mediawiki

	class { '::browsertests': }
}

# == Class: role::umapi
# Configures this machine to run the User Metrics API (UMAPI), a web
# interface for obtaining aggregate measurements of user activity on
# MediaWiki sites.
class role::umapi {
	include role::mediawiki

	class { '::user_metrics': }
}
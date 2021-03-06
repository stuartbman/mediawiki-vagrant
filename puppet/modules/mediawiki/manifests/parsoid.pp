# == Class: mediawiki::parsoid
#
# Parsoid is a wiki runtime which can translate back and forth between
# MediaWiki's wikitext syntax and an equivalent HTML / RDFa document model with
# better support for automated processing and visual editing. Its main user
# currently is the visual editor project.
#
# === Parameters
#
# [*dir*]
#   Install Parsoid to this directory.
#
# [*port*]
#   The Parsoid web service will listen on this port.
#
# [*domain*]
#   The MediaWiki host domain name.
#
# [*uri*]
#   The full URI to the MediaWiki api.php to use.
#
# [*use_php_preprocessor*]
#   If true, use the PHP pre-processor to expand templates via the
#   MediaWiki API.
#
# [*use_selser*]
#   Use selective serialization.
#
# [*allow_cors*]
#   Domains that should be permitted to make cross-domain requests.
#   If false or undefined, disables CORS.
#
# [*workers*]
#   Number of worker processes to fork.
#
class mediawiki::parsoid(
    $dir,
    $port,
    $domain,
    $uri,
    $use_php_preprocessor,
    $use_selser,
    $allow_cors,
    $workers,
) {
    include ::mediawiki
    require ::npm

    git::clone { 'mediawiki/services/parsoid/deploy':
        directory => $dir,
    }

    file { 'parsoid-localsettings.js':
        path    => "${dir}/src/localsettings.js",
        content => template('mediawiki/parsoid.localsettings.js.erb'),
        require => Git::Clone['mediawiki/services/parsoid/deploy'],
    }

    file { '/etc/init/parsoid.conf':
        content => template('mediawiki/parsoid.conf.erb'),
    }

    service::gitupdate { 'parsoid':
        dir     => $dir,
        restart => true,
    }

    service { 'parsoid':
        ensure    => running,
        enable    => true,
        provider  => 'upstart',
        subscribe => File['parsoid-localsettings.js', '/etc/init/parsoid.conf'],
    }
}

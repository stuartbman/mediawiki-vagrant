# == Class: Elasticsearch
#
# Elasticsearch is a powerful open source search and analytics
# engine, much like Solr, but with a more user-friendly inteface.
#
class elasticsearch {
    package { 'elasticsearch':
        ensure => '1.3.4',
    }

    package { 'openjdk-7-jre-headless':
        ensure => present,
    }

    service { 'elasticsearch':
        ensure  => running,
        enable  => true,
        require => Package['elasticsearch', 'openjdk-7-jre-headless'],
    }

    file { '/etc/default/elasticsearch':
        source  => 'puppet:///modules/elasticsearch/defaults',
        require => Package['elasticsearch'],
        notify  => Service['elasticsearch'],
    }

    file { '/etc/elasticsearch/elasticsearch.yml':
        source  => 'puppet:///modules/elasticsearch/elasticsearch.yml',
        require => Package['elasticsearch'],
        notify  => Service['elasticsearch'],
    }
}

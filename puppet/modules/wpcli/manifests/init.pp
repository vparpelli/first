# Install wp-cli

class wpcli::install {

  file { '/usr/local/bin/wp':
    source => 'puppet:///modules/wpcli/wp',
    owner   => 'root',
    group   => 'root',
    mode    => '777',
  }

  file { '/home/vagrant/.wp-cli':
    source => 'puppet:///modules/wpcli/.wp-cli',
    owner   => 'vagrant',
    group   => 'vagrant',
    recurse => true,
    mode    => '777',
  }

}

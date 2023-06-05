module.exports = {
  apps: [
    {
      name: 'client',
      port: 3000,
      script: 'node_modules/nuxt-start/bin/nuxt-start.js',
      cwd: '/var/www/natour-app/client',
      env: {
        NODE_ENV: 'development'
      },
      env_production: {
        NODE_ENV: 'production'
      }
    },
    {
      name: 'client',
      port: 4000,
      script: 'node_modules/nuxt-start/bin/nuxt-start.js',
      cwd: '/var/www/natour-app/client',
      env: {
        NODE_ENV: 'development'
      },
      env_production: {
        NODE_ENV: 'production'
      }
    }
  ]
};

const path = require('path');

module.exports = {
  entry: './divi-module/index.js',
  output: {
    path: path.resolve(__dirname, 'divi-module/build'),
    filename: 'module.js',
    library: {
      name: 'WebJIVEPricingTablesModule',
      type: 'window',
      export: 'default'
    }
  },
  module: {
    rules: [
      {
        test: /\.jsx?$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: [
              '@babel/preset-env',
              ['@babel/preset-react', { runtime: 'automatic' }]
            ]
          }
        }
      }
    ]
  },
  resolve: {
    extensions: ['.js', '.jsx']
  },
  externals: {
    react: 'React',
    'react-dom': 'ReactDOM',
    '@divi/module': 'DiviModule'
  }
};

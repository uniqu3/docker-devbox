var path = require('path');
var resolve = require('path').resolve;
var webpack = require('webpack');

module.exports = {
    mode: 'development',
    entry: {
        main: './src/index.js',
    },
    devServer: {
        publicPath: 'http://localhost:8080',
        host: '0.0.0.0',
        port: 8080,
        https: false,
        proxy: {
            '*': {
                target: 'http://localhost:8000',
            },
        },
        contentBase: path.join(__dirname, 'public'),
        disableHostCheck: true,
        hot: false,
        overlay: true,
        //watchContentBase: true,
        //watchOptions: {
        //poll: true,
        //ignored: /node_modules/,
        //},
        stats: {
            colors: true,
            chunks: false,
        },
        headers: { 'Access-Control-Allow-Origin': '*' },
    },
    output: {
        path: path.join(__dirname),
        filename: '[name].js',
    },
    module: {
        rules: [],
    },
    plugins: [
        new webpack.HotModuleReplacementPlugin(),
        new webpack.NamedModulesPlugin(),
    ],
};

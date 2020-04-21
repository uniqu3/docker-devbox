const env = require('dotenv');
const path = require('path');
const resolve = require('path').resolve;
const webpack = require('webpack');

module.exports = {
    mode: 'development',
    entry: {
        main: './src/index.js',
    },
    devServer: {
        publicPath: 'http://localhost:' + process.env.HOST_PORT_WDS || 8089,
        host: '0.0.0.0',
        port: process.env.HOST_PORT_WDS || 8089,
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
        watchContentBase: true,
        watchOptions: {
            poll: true,
            ignored: /node_modules/,
        },
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

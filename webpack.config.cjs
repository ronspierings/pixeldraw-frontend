const path = require('path');
const { VueLoaderPlugin } = require('vue-loader');

module.exports = {
    mode: 'development',
    entry: './resources/js/app.js',
    output: {
        filename: 'app.js',
        path: path.resolve(__dirname, 'public/js'),
        publicPath: '/js/'
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: /node_modules/,
                options: {
                    presets: ['@babel/preset-env']
                }
            },
            {
                test: /\.css$/,
                use: [
                    'vue-style-loader',
                    'css-loader'
                ]
            },
            {
                test: /\.(png|jpe?g|gif|svg)(\?.*)?$/,
                loader: 'file-loader',
                options: {
                    name: '[name].[hash:8].[ext]'
                }
            }
        ]
    },
    plugins: [
        new VueLoaderPlugin()
    ],
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm-bundler.js'
        },
        extensions: ['*', '.js', '.vue', '.json']
    }
};

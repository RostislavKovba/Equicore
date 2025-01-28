/* eslint-disable @typescript-eslint/no-var-requires */
/**
 * This holds the configuration that is being used for both development and production.
 * This is being imported and extended in the config.development.js and config.production.js files
 *
 * @since 1.1.0
 */
const magicImporter = require('node-sass-magic-importer'); // Add magic import functionalities to SASS
const MiniCssExtractPlugin = require('mini-css-extract-plugin'); // Extracts the CSS files into public/css
const BrowserSyncPlugin = require('browser-sync-webpack-plugin'); // Synchronising URLs, interactions and code changes across devices
const WebpackBar = require('webpackbar'); // Display elegant progress bar while building or watch
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin'); // To optimize (compress) all images using
const CopyPlugin = require('copy-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = (projectOptions) => {
    /**
     * CSS Rules
     */
    const cssRules = {
        test:
            projectOptions.projectCss.use === 'scss'
                ? projectOptions.projectCss.rules.scss.test
                : projectOptions.projectCss.rules.postcss.test,
        exclude: /(node_modules|bower_components|vendor)/,
        use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
            {
                loader: 'postcss-loader',
                options: require(projectOptions.projectCss.postCss)(projectOptions),
            },
        ],
    };

    if (projectOptions.projectCss.use === 'scss') {
        cssRules.use.push({
            loader: 'sass-loader',
            options: {
                sassOptions: {
                    importer: magicImporter(),
                    silenceDeprecations: ['legacy-js-api', 'import', 'mixed-decls', 'color-functions', 'global-builtin'],
                    // If set to true, Sass won’t print warnings that are caused by dependencies (like bootstrap):
                    // https://sass-lang.com/documentation/js-api/interfaces/options/#quietDeps
                    quietDeps: true,
                }, // add magic import functionalities to sass
            },
        });
    }

    /**
     * JavaScript rules
     */
    const jsRules = {
        test: /\.m?js$/,
        include: projectOptions.projectJsPath,
        exclude: /(node_modules|bower_components|vendor)/,
        use: ['babel-loader'], // Configurations in "webpack/babel.config.js"
    };

    /**
     * Images rules
     */
    const imageRules = {
        test: projectOptions.projectImages.rules.test,
        use: [
            {
                loader: 'file-loader',
                options: {
                    outputPath: 'images/',
                    publicPath: '../images/',
                    name: '[name].[ext]',
                },
            },
        ],
    };

    /**
     * Font rules
     */
    const fontRules = {
        test: /\.(woff|woff2|eot|ttf|otf)$/i,
        type: 'asset/resource',
        generator: {
            publicPath: '../fonts/',
            outputPath: 'fonts/',
            filename: '[name][ext]',
        },
    };

    /**
     * Optimization rules
     */
    const optimizations = {
        minimizer: [
            new CssMinimizerPlugin(),
        ],
        minimize: true,
    };

    /**
     * Plugins
     */
    const plugins = [
        new WebpackBar(),
        new MiniCssExtractPlugin({
            filename: projectOptions.projectCss.filename,
        }),
        new CopyPlugin({
            patterns: [
                {
                    from: projectOptions.projectImagesPath,
                    to: `${projectOptions.projectOutput}/images`,
                },
            ],
        }),
        // new ImageMinimizerPlugin({
        //     minimizerOptions: projectOptions.projectImages.minimizerOptions,
        // }),
    ];

    if (projectOptions.browserSync.enable === true) {
        const browserSyncOptions = {
            files: projectOptions.browserSync.files,
            host: projectOptions.browserSync.host,
            port: projectOptions.browserSync.port,
        };
        if (projectOptions.browserSync.mode === 'server') {
            Object.assign(browserSyncOptions, {
                server: projectOptions.browserSync.server,
            });
        } else {
            Object.assign(browserSyncOptions, {
                proxy: projectOptions.browserSync.proxy,
            });
        }
        plugins.push(
            new BrowserSyncPlugin(browserSyncOptions, {
                reload: projectOptions.browserSync.reload,
            })
        );
    }

    return {
        cssRules,
        jsRules,
        imageRules,
        optimizations,
        plugins,
        fontRules,
    };
};

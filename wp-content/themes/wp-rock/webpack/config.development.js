/* eslint-disable @typescript-eslint/no-var-requires */
/**
 * Webpack's configurations for the development environment
 * based on the script from package.json
 * Run with: "npm run dev" or "npm run dev:watch"
 */
const ESLintPlugin = require('eslint-webpack-plugin');
const StylelintPlugin = require('stylelint-webpack-plugin');
const path = require('path');

module.exports = (projectOptions) => {
    process.env.NODE_ENV = 'development';

    const Base = require('./config.base')(projectOptions);

    const cssRules = {
        ...Base.cssRules,
    };

    const jsRules = {
        ...Base.jsRules,
    };

    const imageRules = {
        ...Base.imageRules,
    };

    const fontRules = {
        ...Base.fontRules,
    };

    const optimizations = {
        ...Base.optimizations,
    };

    const plugins = [
        ...Base.plugins,
    ];

    if (projectOptions.projectJs.eslint === true) {
        plugins.push(new ESLintPlugin());
    }

    if (projectOptions.projectCss.stylelint === true) {
        plugins.push(new StylelintPlugin());
    }

    const sourceMap = { devtool: false };
    if (
        projectOptions.projectSourceMaps.enable === true &&
        (projectOptions.projectSourceMaps.env === 'dev' ||
            projectOptions.projectSourceMaps.env === 'dev-prod')
    ) {
        sourceMap.devtool = projectOptions.projectSourceMaps.devtool;
    }

    return {
        mode: 'development',
        entry: projectOptions.projectJs.entry,
        output: {
            path: projectOptions.projectOutput,
            filename: projectOptions.projectJs.filename,
            assetModuleFilename: 'fonts/[name][ext]',
        },
        devtool: sourceMap.devtool,
        optimization: optimizations,
        module: { rules: [cssRules, jsRules, imageRules, fontRules] },
        plugins,
        resolve: {
            modules: [path.resolve(__dirname, 'src'), 'node_modules'],
            extensions: ['.js', '.json'],
        },
    };
};

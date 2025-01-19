/* eslint-disable @typescript-eslint/no-var-requires */
/**
 * Webpack's configurations for the production environment
 * based on the script from package.json
 * Run with: "npm run prod" or "npm run prod:watch"
 */
const glob = require('glob-all');
const path = require('path');

module.exports = (projectOptions) => {
    process.env.NODE_ENV = 'production';

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

    const sourceMap = { devtool: false };
    if (
        projectOptions.projectSourceMaps.enable === true &&
        (projectOptions.projectSourceMaps.env === 'prod' ||
            projectOptions.projectSourceMaps.env === 'dev-prod')
    ) {
        sourceMap.devtool = projectOptions.projectSourceMaps.devtool;
    }

    return {
        mode: 'production',
        entry: projectOptions.projectJs.entry,
        output: {
            path: projectOptions.projectOutput,
            filename: projectOptions.projectJs.filename,
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

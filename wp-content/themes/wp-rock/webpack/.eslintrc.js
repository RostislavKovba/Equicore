/**
 * Eslint config file
 * as configured in package.json under eslintConfig.extends
 *
 * @docs BabelJS: https://babeljs.io/
 * @docs Webpack babel-loader: https://webpack.js.org/loaders/babel-loader/
 * @docs @wordpress/eslint-plugin : https://www.npmjs.com/package/@wordpress/eslint-plugin
 * @since 1.0.0
 */
module.exports = {
    parser: '@babel/eslint-parser', // Specifies the ESLint parser
    parserOptions: {
        ecmaVersion: 'latest',
        sourceType: 'module',
        requireConfigFile: false,
    },
    env: {
        es6: true,
        es2021: true,
        browser: true,
        commonjs: true,
        node: true,
        jquery: true,
        amd: true,
    },
    extends: [
        'airbnb-base',
        'plugin:@wordpress/eslint-plugin/recommended',
    ],
    rules: {
        'no-console': 'off',
        'no-unused-expressions': 'off',
        'no-await-in-loop': 'off',
        'no-continue': 'off',
        'class-methods-use-this': 'off',
        'operator-linebreak': 'off',
        'no-plusplus': 'off',
        'no-async-promise-executor': 'off',
        // indent: ['error', 4],
        // 'prettier/prettier': [2, { useTabs: false }],
        'import/extensions': [
            'error',
            'ignorePackages',
            {
                js: 'never',
                jsx: 'never',
            },
        ],
        'no-lone-blocks': 'off',
    },
    globals: {
        wp: true,
        jQuery: true,
    },
    ignorePatterns: [
        'tests/**/*.js',
        'temp.js',
        '/vendor/**/**/*.js',
        '/node_modules/**/**/*.js',
    ],
};

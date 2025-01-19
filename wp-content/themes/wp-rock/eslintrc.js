module.exports = {
    root: true,
    env: {
        browser: true,
        es6: true,
        node: true,
    },
    // extends: ['eslint:recommended', 'plugin:prettier/recommended'],
    extends: ['eslint:recommended'],
    parserOptions: {
        ecmaVersion: 2020,
        sourceType: 'module',
    },
    rules: {
        'prettier/prettier': 'error',
        'no-unused-vars': 'warn',
        'no-console': 'off',
        'no-var': 'error',
        'prefer-const': 'error',
    },
};

/*
 * grunt-contrib-less
 * http://gruntjs.com/
 *
 * Copyright (c) 2013 Tyler Kellen, contributors
 * Licensed under the MIT license.
 */

'use strict';

module.exports = function(grunt) {
    // Project configuration.
    grunt.initConfig({
        less: {
            compile: {
                options: {
                    paths: ['less'],
                    yuicompress: true
                },
                files: {
                    'css/style.css': 'stylesheets/less/style.less'
                }
            }
	}
    });

    // Actually load this plugin's task(s).
    grunt.loadTasks('tasks');

    grunt.loadNpmTasks('grunt-contrib-less');
};

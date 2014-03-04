module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch:{
			compass:{
				files: ['**/*.{scss,sass}'],
				tasks: ['compass:dev']
			}
		},
		compass:{
			dev:{
				options:{
					sassDir: ['sass'],
					cssDir: ['css'],
					environment: 'development',
					outputStyle: 'compressed'
				}
			}
		}
	});

	// Load plugins
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');

	// Default task(s).
	grunt.registerTask('default', ['compass:dev', 'watch']);

};
/*global module:false*/
module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		meta: {
			banner: '/* \n' +
					' * <%= pkg.name %> v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %> \n' +
					' * <%= pkg.description %> \n' +
					' * <%= pkg.homepage %> \n' +
					' * \n' +
					' * Copyright <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>; <%= pkg.license %> Licensed \n' +
					' */ \n\n'
		},
		// JS Hint
		jshint: {
			options: {
				globals: {
					'jQuery': true,
					'$'     : true
				},
				browser:   true,
				curly:     true,
				eqeqeq:    true,
				forin:     true,
				freeze:    true,
				immed:	   true,
				latedef:   true,
				newcap:    true,
				noarg:     true,
				nonew:     true,
				smarttabs: true,
				sub:       true,
				undef:     true,
				validthis: true
			},
			files: ['src/<%= pkg.codename %>.js']
		},
		// Concat
		concat: {
			js: {
				options: {
					banner: '<%= meta.banner %>'
				},
				files: {
					'<%= pkg.codename %>.js': [ 'src/<%= pkg.codename %>.js' ]
				}
			},
			css: {
				options: {
					banner: '<%= meta.banner %>'
				},
				files: {
					'<%= pkg.codename %>.css': [ 'src/<%= pkg.codename %>.css' ]
				}
			}
		},
		// Uglify
		uglify: {
			options: {
				banner: '<%= meta.banner %>',
				report: 'min'
			},
			target: {
				files: {
					'<%= pkg.codename %>.min.js': [ '<%= pkg.codename %>.js' ]
				}
			}
		},
		// jQuery Manifest
		jquerymanifest: {
			options: {
				source: grunt.file.readJSON('package.json'),
				overrides: {
					name:     '<%= pkg.id %>',
					keywords: '<%= pkg.keywords %>',
					homepage: '<%= pkg.homepage %>',
					docs: 	  '<%= pkg.homepage %>',
					demo: 	  '<%= pkg.homepage %>',
					download: '<%= pkg.repository.url %>',
					bugs: 	  '<%= pkg.repository.url %>/issues',
					dependencies: {
						jquery: '>=1.7'
					}
				}
			}
		},
		//Bower sync
		sync: {
			all: {
				options: {
					sync: [ 'name', 'version', 'description', 'author', 'license', 'homepage' ],
					overrides: {
						main: [
							'<%= pkg.codename %>.js',
							'<%= pkg.codename %>.css'
						],
						ignore: [ "*.jquery.json", "Gruntfile.js", "src/" ]
					}
				}
			}
		}
	});

	// Readme
	grunt.registerTask('buildReadme', 'Build Formstone README.md file.', function () {
		var pkg = grunt.file.readJSON('package.json'),
			destination = "README.md",
			markdown = '<h2>Development of this plugin has ended. Please upgrade to the new <a href="http://formstone.it">Formstone</a>.</h2><br> \n\n' +
					   '<a href="http://gruntjs.com" target="_blank"><img src="https://cdn.gruntjs.com/builtwith.png" alt="Built with Grunt"></a> \n' +
					   '# ' + pkg.name + ' \n\n' +
					   pkg.description + ' \n\n' +
					   '- [Demo](' + pkg.demo + ') \n' +
					   '- [Documentation](' + pkg.homepage + ') \n\n' +
					   '#### Bower Support \n' +
					   '`bower install ' + pkg.name + '` \n\n' +
					   '#### Forked by Marc Brooks <IDisposable@gmail.com> for 3.1.0 \n' +
                       '- Allow multiple intances of zoomers on the same page while using custom UI control selectors. \n' +
                       '- Use a div around your zoomer container that scopes the custom controls \n' +
                       '- Potentially breaking change if the controls were not shared by the parent previously.';

		grunt.file.write(destination, markdown);
		grunt.log.writeln('File "' + destination + '" created.');
	});

	// Load tasks
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-jquerymanifest');
	grunt.loadNpmTasks('grunt-npm2bower-sync');

	// Default task.
	grunt.registerTask('default', [ 'jshint', 'concat', 'uglify', 'jquerymanifest', 'sync', 'buildReadme' ]);

};
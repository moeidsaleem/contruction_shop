var GruntPATH 	= 'D:/PHP/TestPHP/BuildJS/gruntjs/Build_V3/';
var BuildPATH 	= './tmp/';
var OutputPATH 	= './';

console.log('\n***************************************************************************\n');
//console.log('* 	GruntPATH : '	+ 	GruntPATH 	+	'\n');
console.log('* 	OutputPATH : '	+	OutputPATH	+	'\n');
console.log('***************************************************************************\n');
//console.log('* 	TempPATH : '	+	BuildPATH	+	'\n');

module.exports = function(grunt) {
	//grunt.file.setBase(GruntPATH);
    grunt.initConfig({

      	clean: {
             build: [BuildPATH],
        },
		
        copy: {
            main: {
                expand: true,
                cwd: BuildPATH,
                src: '**',
                dest: OutputPATH,

            },
        },

        concat : {
            options: {
                separator: '\n\n//------------------------------------------\n',
                banner: '\n\n//------------------------------------------\n'
            },            
	   		all : {
                src: [
					'vendor/jquery/jquery.min.js',
					'vendor/bootstrap/js/bootstrap.min.js',
					'vendor/bootstrap-datepicker/js/bootstrap-datepicker.js',
					'vendor/bootstrap-datepicker/locales/bootstrap-datepicker.nl.min.js',
					'vendor/bootstrap-datepicker/locales/bootstrap-datepicker.fr.min.js',
					'vendor/greensock/TweenMax.min.js',
					'vendor/greensock/plugins/DirectionalRotationPlugin.min.js',
					'js/lib/jquery.validate.min.js',
					'js/lib/jquery.maxlength.min.js',
					'js/app/class.paramater.js',
					'js/app/class.popup.js',
					'js/app/class.controls.js',
					'js/app/class.game.js',
					'js/app/class.SiteMain.js',
					'js/app/cls.Validation.js',
					'js/app/cls.ShareSocial.js',
					'js/app/cls.GATracking.js',
					'js/app/cls.MainProcess.js',
					],
                dest: BuildPATH + 'all.src.js'
            }
        }, //concat
		uglify: {
			options: {
			  mangle: false,
			  compress : true
			},		
			all: {
			  files: {
				'./tmp/all.min.js': [ BuildPATH + 'all.src.js']
			  }
			}
		},
		obfuscator: {
		    options: {
		        //banner: '// obfuscated with grunt-contrib-obfuscator.\n',
		        //debugProtection: true,
		        //debugProtectionInterval: true,
		        //domainLock: ['www.example.com']
		    },
		    task: {
		        options: {
		            // options for each sub task 
		        },
		        files: {
		            './tmp/all.js': [
		                BuildPATH + 'all.min.js'
		            ]
		        }
		    }
		},
        watch: {
            options: {
                spawn: false,
                interval: 1000,
                //livereload: 35730 //35729
				//livereload: parseInt('357290'+Math.floor(Math.random()*1000),10)
            },
            scripts: {
                files: ['app/**/*.js','lib/**/*.js'],
				tasks: ['concat', 'uglify','obfuscator', 'copy','clean']
            }
        }
    }); //initConfig
    
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
 	grunt.loadNpmTasks('grunt-contrib-uglify');	
 	grunt.loadNpmTasks('grunt-contrib-obfuscator');	
 	
	grunt.registerTask('default', ['concat', 'uglify', 'obfuscator', 'copy','clean']);// ,'watch'

}; //wrapper function
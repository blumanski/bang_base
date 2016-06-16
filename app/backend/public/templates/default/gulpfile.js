var gulp 		= require('gulp');
var gutil 		= require('gulp-util');
var bower 		= require('bower');
var concat 		= require('gulp-concat');
var sass 		= require('gulp-sass');
var minifyCss 	= require('gulp-cssnano');
var uglify 		= require('gulp-uglify');
var notify 		= require('gulp-notify');
var ngAnnotate  = require('gulp-ng-annotate');
var rename 		= require('gulp-rename');
var sh 			= require('shelljs');

var paths = {
  sass: ['./scss/**/*.scss']
};

gulp.task('default', ['sass']);

gulp.task('sass', function(done) {
  gulp.src('./scss/app.scss')
    .pipe(sass({errLogToConsole: true}))
    .pipe(sass({ 
      style: 'compressed',
      sourceComments: 'normal'
    }))
    .on('error', sass.logError)
    .pipe(gulp.dest('./min/css/'))
    .pipe(minifyCss({
      keepSpecialComments: 0
    }))
    .pipe(rename({ extname: '.min.css' }))
    .pipe(gulp.dest('./min/css/'))
    .on('end', done);
});



//gulp.task('sass', function () {
//    gulp.src(['yourCSSFolder/*.scss', 'yourCSSFolder/**/*.scss'])
//        .pipe(sass({outputStyle: 'compressed'}))
//        .pipe(gulp.dest('yourCSSFolder/'));
//});



//gulp.task('modules', function(done) {
//  gulp.src('../../../modules/**/assets/scss/*.scss')
//    .pipe(sass({errLogToConsole: true}))
//    .pipe(sass({ 
//      style: 'expanded',
//      sourceComments: 'normal'
//    }))
//    .on('error', sass.logError)
//    .pipe(gulp.dest('./min/css/'))
//    .pipe(minifyCss({
//      keepSpecialComments: 0
//    }))
//    .pipe(rename({ extname: '.min.css' }))
//    .pipe(gulp.dest('./min/css/'))
//    .on('end', done);
//});

//gulp.task('modjs', function(){
//	
//	gulp.src([
//	          '../../../modules/*/assets/js/*.js',
//	        ])
//	        .pipe(ngAnnotate())
//	        .pipe(concat('modules.js'))
//	        .pipe(uglify())
//	        .pipe(gulp.dest('./min/js/'))
//	        .pipe(notify({ message: 'Finished minifying JavaScript'}));
//});

/** SASS Account */
gulp.task('sass_account', function(done) {
  gulp.src('../../../modules/account/assets/scss/account.scss')
    .pipe(sass({errLogToConsole: true}))
    .pipe(sass({ 
      style: 'expanded',
      sourceComments: 'normal'
    }))
    .on('error', sass.logError)
    .pipe(gulp.dest('./min/css/'))
    .pipe(minifyCss({
      keepSpecialComments: 0
    }))
    .pipe(rename({ extname: '.min.css' }))
    .pipe(gulp.dest('./min/css/'))
    .on('end', done);
});

/** SASS Dashboard */
gulp.task('sass_dashboard', function(done) {
  gulp.src('../../../modules/dashboard/assets/scss/dashboard.scss')
    .pipe(sass({errLogToConsole: true}))
    .pipe(sass({ 
      style: 'expanded',
      sourceComments: 'normal'
    }))
    .on('error', sass.logError)
    .pipe(gulp.dest('./min/css/'))
    .pipe(minifyCss({
      keepSpecialComments: 0
    }))
    .pipe(rename({ extname: '.min.css' }))
    .pipe(gulp.dest('./min/css/'))
    .on('end', done);
});

/** SASS Directory */
gulp.task('sass_directory', function(done) {
  gulp.src('../../../modules/directory/assets/scss/directory.scss')
    .pipe(sass({errLogToConsole: true}))
    .pipe(sass({ 
      style: 'expanded',
      sourceComments: 'normal'
    }))
    .on('error', sass.logError)
    .pipe(gulp.dest('./min/css/'))
    .pipe(minifyCss({
      keepSpecialComments: 0
    }))
    .pipe(rename({ extname: '.min.css' }))
    .pipe(gulp.dest('./min/css/'))
    .on('end', done);
});

/** SASS Content */
gulp.task('sass_content', function(done) {
  gulp.src('../../../modules/content/assets/scss/content.scss')
    .pipe(sass({errLogToConsole: true}))
    .pipe(sass({ 
      style: 'expanded',
      sourceComments: 'normal'
    }))
    .on('error', sass.logError)
    .pipe(gulp.dest('./min/css/'))
    .pipe(minifyCss({
      keepSpecialComments: 0
    }))
    .pipe(rename({ extname: '.min.css' }))
    .pipe(gulp.dest('./min/css/'))
    .on('end', done);
});


/** Content Moduel Javascript **/
gulp.task('mod_content', function(){
	
	gulp.src([
	          '../../../modules/content/assets/js/*.js',
	          'bower_components/EasyAutocomplete/dist/jquery.easy-autocomplete.js',
	          'bower_components/interact/dist/interact.js'
	        ])
	        .pipe(ngAnnotate())
	        .pipe(concat('content.js'))
	        .pipe(uglify())
	        .pipe(gulp.dest('./min/js/'))
	        .pipe(notify({ message: 'Finished minifying JavaScript'}));
});

/** Account Moduel Javascript **/
gulp.task('mod_account', function(){
	
	gulp.src([
	          '../../../modules/account/assets/js/*.js',
	        ])
	        .pipe(ngAnnotate())
	        .pipe(concat('account.js'))
	        .pipe(uglify())
	        .pipe(gulp.dest('./min/js/'))
	        .pipe(notify({ message: 'Finished minifying JavaScript'}));
});

/** Dashboard Moduel Javascript **/
gulp.task('mod_dashboard', function(){
	
	gulp.src([
	          '../../../modules/dashboard/assets/js/*.js',
	        ])
	        .pipe(ngAnnotate())
	        .pipe(concat('dashboard.js'))
	        //.pipe(uglify())
	        .pipe(gulp.dest('./min/js/'))
	        .pipe(notify({ message: 'Finished minifying JavaScript'}));
});

/** Dashboard Moduel Javascript **/
gulp.task('mod_directory', function(){
	
	gulp.src([
	          '../../../modules/directory/assets/js/*.js',
	        ])
	        .pipe(ngAnnotate())
	        .pipe(concat('directory.js'))
	        //.pipe(uglify())
	        .pipe(gulp.dest('./min/js/'))
	        .pipe(notify({ message: 'Finished minifying JavaScript'}));
});


gulp.task('jstop', function(){
	
	gulp.src(['bower_components/fingerprintjs2/dist/fingerprint2.min.js',
	          'bower_components/jquery/dist/jquery.js',
	          'bower_components/uikit/js/uikit.js',
	          'bower_components/uikit/js/components/nestable.js',
	          'bower_components/pusher/dist/pusher.min.js'
	        ])
	        .pipe(ngAnnotate())
	        .pipe(concat('top.js'))
	        .pipe(uglify())
	        .pipe(gulp.dest('./min/js/'))
	        .pipe(notify({ message: 'Finished minifying JavaScript'}));
});

gulp.task('matze', function(){
	
	gulp.src([
	    "js/materialize-plugins/materialize.min.js",      
		"js/materialize-plugins/leanModal.js",
		"js/materialize-plugins/materialbox.js",
		"js/materialize-plugins/tabs.js",
		"js/materialize-plugins/tooltip.js",
		"js/materialize-plugins/waves.js",
		"js/materialize-plugins/toasts.js",
		"js/materialize-plugins/sideNav.js",
		"js/materialize-plugins/cards.js",
		"js/materialize-plugins/chips.js",
		"js/materialize-plugins/pushpin.js",
		"js/materialize-plugins/forms.js",
		"js/materialize-plugins/buttons.js",
		"js/materialize-plugins/transitions.js",
		"js/materialize-plugins/scrollFire.js",
		"js/materialize-plugins/date_picker/picker.js",
		"js/materialize-plugins/date_picker/picker.date.js",
		"js/materialize-plugins/character_counter.js"
	        ])
	        .pipe(ngAnnotate())
	        .pipe(concat('materialize.js'))
	        .pipe(uglify())
	        .pipe(gulp.dest('./js/'))
	        .pipe(notify({ message: 'Finished minifying JavaScript'}));
});


gulp.task('jsbottom', function(){
	
	gulp.src([
	          'js/materialize.js',
	          'js/plugins.js',
	          'bower_components/moment/min/moment-with-locales.min.js',
	          'js/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
	          'js/default.js'
	        ])
	        .pipe(ngAnnotate())
	        .pipe(concat('bottom.js'))
	        .pipe(uglify())
	        .pipe(gulp.dest('./min/js/'))
	        .pipe(notify({ message: 'Finished minifying JavaScript'}));
});


gulp.task('alljs', ['jsbottom', 'mod_account', 'mod_content', 'jstop', 'mod_dashboard', 'mod_directory']);

gulp.task('allsass', ['sass_account', 'sass_content', 'sass_directory', 'sass_dashboard', 'sass']);

gulp.task('watch', function() {
  gulp.watch(paths.sass, ['sass']);
});


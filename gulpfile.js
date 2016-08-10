var gulp = require( 'gulp' );
var sass = require( 'gulp-sass' );
var sourcemaps = require( 'gulp-sourcemaps' );

gulp.task( 'sass', function() {
	return gulp.src( './assets/sass/**/*.scss' )
		.pipe(sourcemaps.init())
		.pipe( sass().on('error', sass.logError))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./assets/css'));
});

var autoprefixer  = require( 'autoprefixer' );
var bourbon       = require( 'bourbon' );
var browserSync   = require( 'browser-sync' );
var del           = require( 'del' );
var gulp          = require( 'gulp' );
var mqpacker      = require( 'css-mqpacker' );
var neat          = require( 'bourbon-neat' );
var plumber       = require( 'gulp-plumber' );
var postcss       = require( 'gulp-postcss' );
var rename        = require( 'gulp-rename' );
var sass          = require( 'gulp-sass' );
var sourcemaps    = require( 'gulp-sourcemaps' );

var paths = {
	sass: 'assets/sass/**/*.scss',
};

gulp.task( 'clean:styles', function() {
	return del(['wp-style-tiles.css', 'wp-style-tiles.min.css'])
});

gulp.task( 'sass', function() {

	return gulp.src( './assets/sass/**/*.scss' )
		.pipe(sourcemaps.init())
		.pipe(sass({
			includePaths: [
				require('bourbon').includePaths,
				require('bourbon-neat').includePaths
			]
		}))
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./assets/css'));
});

gulp.task( 'postcss', ['clean:styles'], function() {
	var processors = [
		autoprefixer({browsers: ['last 2 version']}),
		mqpacker({sort: true}),
	];

	return gulp.src('./assets/css/*.css')
		.pipe(postcss(processors))
		.pipe(gulp.dest('./'))
		.pipe(browserSync.stream());
});

gulp.task( 'styles', ['sass', 'postcss'] );

gulp.task( 'watch', function() {

	browserSync({
		open: false,
		injectChanges: true,
		proxy: "local.wordpress.dev",
		watchOptions: {
			debounceDelay: 1000
		}
	});

	gulp.watch(paths.sass, ['styles']);
});

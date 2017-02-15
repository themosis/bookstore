var gulp = require('gulp'),
    gutil = require('gulp-util'),
    autoprefixer = require('autoprefixer'),
    bs = require('browser-sync').create(),
    cleancss = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    stylus = require('gulp-stylus'),
    postcss = require('gulp-postcss'),
    flexibility = require('postcss-flexibility');

/* Directories */
var dirs = {
    src: './assets',
    dest: './dist'
};

/**
 * Error reporting helper function.
 * Code from https://github.com/brendanfalkowski
 *
 * @param err
 */
var errorReport = function(err)
{
    var lineNumber = (err.lineNumber) ? 'LINE ' + err.lineNumber + ' -- ' : '';

    notify({
        title: 'Task failed [' + err.plugin + ']',
        message: lineNumber + 'See console.',
        sound: 'Basso'
    }).write(err);

    gutil.beep();

    // Report the error on the console
    var report = '';
    var chalk = gutil.colors.bgMagenta.white;

    report += chalk('TASK:') + ' [' + err.plugin + ']\n';
    report += chalk('ISSUE:') + ' ' + err.message + '\n';
    if (err.lineNumber) { report += chalk('LINE:') + ' ' + err.lineNumber + '\n'; }
    if (err.fileName)   { report += chalk('FILE:') + ' ' + err.fileName + '\n'; }
    console.log(report);

    // Prevent the 'watch' task from stopping
    this.emit('end');
};

/*-------*/
/* Tasks */
/*-------*/
// Sass
// Compatibility with Bootstrap 3.3.7 Sass
gulp.task('sass:dev', function () {
    return gulp.src(dirs.src + '/sass/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed',
            precision: 10
        }).on('error', sass.logError))
        .pipe(postcss([autoprefixer({
            browsers: [
                "Android 2.3",
                "Android >= 4",
                "Chrome >= 20",
                "Firefox >= 24",
                "Explorer >= 8",
                "iOS >= 6",
                "Opera >= 12",
                "Safari >= 6"
            ]
        })]))
        .pipe(cleancss())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest(dirs.dest + '/css'))
        .pipe(bs.stream());
});

gulp.task('sass', function () {
    return gulp.src(dirs.src + '/sass/*.scss')
        .pipe(sass({
            outputStyle: 'compressed',
            precision: 10
        }).on('error', sass.logError))
        .pipe(postcss([autoprefixer({
            browsers: [
                "Android 2.3",
                "Android >= 4",
                "Chrome >= 20",
                "Firefox >= 24",
                "Explorer >= 8",
                "iOS >= 6",
                "Opera >= 12",
                "Safari >= 6"
            ]
        })]))
        .pipe(cleancss())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(dirs.dest + '/css'));
});

/*------------*/
/* Watch Task */
/*------------*/
gulp.task('watch', function()
{
    bs.init({
        https: false
    });

    gulp.watch(dirs.src + '/sass/**/*.scss', gulp.series('sass:dev'));
});

/*------------*/
/* Build task */
/*------------*/
gulp.task('build', gulp.series('sass'));
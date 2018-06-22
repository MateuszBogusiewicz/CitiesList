var gulp = require('gulp');
var uglifycss = require('gulp-uglifycss');
var sass = require('gulp-sass');
var cssScss = require('gulp-css-scss');

//Turns css into scss file.
gulp.task('cssScss', function (){
    return gulp.src('web/css/**/*.css')
        .pipe(cssScss())
        .pipe(uglifycss())
        .pipe(gulp.dest('web/GULP/scss'));
});

//Turns scss into css file.
gulp.task('sass', function (){
    return gulp.src('web/GULP/scss/**/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('web/css'));
});

//Compress img
gulp.task('img', function() {
    return gulp.src('web/img/**/*.*')
        .pipe(gulp.dest('web/GULP/img'));
});

gulp.task('default', ['cssScss', 'sass']);

gulp.task('watch', function () {
    gulp.watch('web/css/**/*.css', ['cssScss']);
    gulp.watch('web/GULP/scss/**/*.scss', ['sass']);
    gulp.watch('web/img/**/*.*', ['img']);
});


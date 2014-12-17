var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');

// Sass
gulp.task('sass', function () {
  gulp.src('./css/**/*.scss')
    .pipe(sass())
    .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
    .pipe(gulp.dest('./css'));
});

// Rerun the task when a file changes
gulp.task('watch', function() {
  gulp.watch(['./css/**/*'], ['sass']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['sass', 'watch']);
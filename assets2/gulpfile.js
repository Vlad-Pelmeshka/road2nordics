'use strict';

import gulp from 'gulp';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';
import replace from 'gulp-replace';
import cssnano from 'cssnano';
import postcss from 'gulp-postcss';
import through2 from 'through2';
import sortMediaQueries from 'postcss-sort-media-queries';


import browserSync from 'browser-sync';
import { deleteAsync } from 'del';

const isProduction = process.argv.includes('--production');
const bs = browserSync.create();

function sass_p() {
    return gulp.src('scss/**/*.scss')
        .pipe(!isProduction ? sourcemaps.init() : through2.obj())
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(replace('@charset "UTF-8";', ''))
        .pipe(postcss([
            sortMediaQueries(),
            cssnano({
                preset: ['default', {
                    discardComments: { removeAll: true },
                    normalizeWhitespace: true,
                    mergeLonghand: true,
                    cssDeclarationSorter: true,
                    minifyFontValues: true,
                    reduceInitial: true,
                    reduceTransforms: true,
                    colormin: true,
                    convertValues: true,
                    orderedValues: true,
                    mergeRules: true,
                    discardDuplicates: true,
                    discardOverridden: true
                }]
            })
        ]))
        .pipe(!isProduction ? sourcemaps.write('.') : through2.obj())
        .pipe(gulp.dest('css'));
};

gulp.task('styles', sass_p);

gulp.task('clean', function () {
    return deleteAsync(['css/**'], { force: true });
});

gulp.task('watch', gulp.series('clean', gulp.parallel('styles'), function () {
    bs.init({
        proxy: 'http://localhost',
        logLevel: "debug",
        files: ['css/**/*.css', 'js/**/*.js'],
        port: 3000,
        watchOptions: {
            usePolling: true,
        },
    });
    gulp.watch('scss/**/*.scss', gulp.parallel('styles'));
    gulp.watch("../../**/*.php").on('change', bs.reload);
}));

gulp.task('default', gulp.series('clean', gulp.parallel('styles')));
gulp.task('build', gulp.series('clean', gulp.parallel('styles')));

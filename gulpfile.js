const { src, dest, watch, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const cssnano = require('cssnano');
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');
const notify = require('gulp-notify');
const webp = require('gulp-webp');
const sharpResponsive = require('gulp-sharp-responsive');

const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*'
};

function css() {
    return src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./public/build/css'))
        .pipe(notify({ message: 'CSS Compilado 🧵✅' }));
}

function javascript() {
    return src(paths.js)
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./public/build/js'))
        .pipe(notify({ message: 'JS Minificado ✅'}));
}

function imagenes() {
    return src(paths.imagenes)
        .pipe(sharpResponsive({
            formats: [
                { format: 'jpeg', quality: 80 },
                { format: 'png', quality: 80 }
            ]
        }))
        .pipe(dest('./public/build/img'))
        .pipe(notify({ message: 'Imágenes optimizadas ✅' }));
}

function versionWebp() {
    return src(paths.imagenes)
        .pipe(sharpResponsive({
            formats: [
                { format: 'webp', quality: 80 }
            ]
        }))
        .pipe(dest('./public/build/img/webp'))
        .pipe(notify({ message: 'WebP listo ✅' }));
}

function watchArchivos(cb) {
    watch(paths.scss, css);
    watch(paths.js, javascript);
    watch(paths.imagenes, imagenes);
    watch(paths.imagenes, versionWebp);
    cb();
}

exports.default = parallel(css, javascript, imagenes, versionWebp, watchArchivos);

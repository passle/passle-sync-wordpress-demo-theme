const { src, dest, series } = require("gulp");
const zip = require("gulp-zip");
const { spawn } = require("child_process");

const THEME_SLUG = "passle-sync-demo";

const build = (cb) => {
  spawn("npm", ["run", "production"], {
    stdio: "inherit",
    shell: true,
  }).on("close", cb);
};

const buildZip = (cb) => {
  src([
    "**/*",
    "!**/node_modules{,/**}",
    "!resources{,/**}",
    "!postcss.config.js",
    "!safelist.txt",
    "!tailwind.config.js",
    "!.vscode{,/**}",
    "!gulpfile.js",
    "!package.json",
    "!package-lock.json",
    "!build{,/**}",
  ])
    .pipe(zip(`${THEME_SLUG}.zip`))
    .pipe(dest("./build/"));

  cb();
};

exports.init = build;
exports.buildZip = series(build, buildZip);

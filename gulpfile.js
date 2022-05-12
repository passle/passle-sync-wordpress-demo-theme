const { src, dest } = require("gulp");
const zip = require("gulp-zip");
const chalk = require("chalk");

const THEME_SLUG = "passle-sync-demo";

const buildZip = (cb) => {
  console.log(
    chalk.yellow(
      `!!\n!! Make sure you have run ${chalk.bold.cyan(
        "npm run production",
      )} before running build-zip.\n!!`,
    ),
  );

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

exports.buildZip = buildZip;

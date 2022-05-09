# Passle Sync Demo Theme for Wordpress

Passle Sync Demo is a theme for Wordpress which makes use of the [Passle Sync](https://github.com/passle/passle-sync-wordpress) plugin.

## 🚀 Getting started

This theme is intended to serve as an example of how to use the Passle Sync plugin in your theme templates. To get started, take a look at the templates for the custom post types that the plugin creates, [single-passle-post.php](./single-passle-post.php), and [single-passle-author.php](./single-passle-author.php).

These templates are pretty standard - the important thing is that they are named correctly, [as described in the Wordpress documentation](https://developer.wordpress.org/themes/template-files-section/custom-post-type-template-files/). The interesting stuff all happens in the template parts, [content-single-passle-post.php](./template-parts/content-single-passle-post.php), and [content-single-passle-author.php](./template-parts/content-single-passle-author.php).

For more info on how to use the Passle Sync plugin, view the [API documentation](https://github.com/passle/passle-sync-wordpress/blob/master/docs/index.md) in the plugin's repository.

## 🔧 Requirements

TBD

## 👨‍💻 Development

<details>
<summary>Environment setup</summary>

To develop this theme, first clone the repository:

```
git clone https://github.com/passle/passle-sync-wordpress-demo-theme
```

To build the CSS and JavaScript, use the `watch` and `production` scripts availabile in `package.json`.

</details>

## 💬 Contributing

If you'd like to request a feature or report a bug, please create a GitHub Issue.

## 📜 License

The Passle Sync demo theme is released under the under terms of the [MIT License](./LICENSE).

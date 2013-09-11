# FSINF v2 Homepage

The new homepage. Goes along with [WP-Stack][wpstack].

The structure and code are adapted from [Wordpress-Skeleton][wpskel].

## Assumptions

* WordPress as a Git submodule in `/wp/`
* Custom content directory in `/content/` (cleaner, and also because it can't be in `/wp/`)
* `wp-config.php` in the root (because it can't be in `/wp/`)
* All writable directories are symlinked to similarly named locations under `/shared/`.

[wpskel]: https://github.com/markjaquith/WordPress-Skeleton
[wpstack]: https://github.com/markjaquith/WP-Stack

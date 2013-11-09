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

## Wordpress Versioning

To bump the version of Wordpress to a specific version,
you have to reset the `/wp/` submodule to the commit containing the version.
You can do this as follows:

To pull all branch information from origin:

	git fetch

If the version has a tag:

	git checkout versionNumber-branch
	git reset --hard tag-name

If the version has no tag:

	git checkout versionNumber-branch
	git reset --hard commit_hash_that_contains_your_version

Then stage the changes of the `wp` submodule and commit them.

## Deployment

	sudo su deploy
	# or
	su deploy

	cd ~/deploy
	cap deploy production
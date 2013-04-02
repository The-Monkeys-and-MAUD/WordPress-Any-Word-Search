![The Monkeys](http://www.themonkeys.com.au/img/monkey_logo.png)

WordPress Any Word Search Plugin
================================
This is a very simple WordPress plugin that makes the WordPress search box find posts that contain ANY of the words
entered instead of only posts that contain ALL of the words; that is, it makes the search use the OR operator instead of
the default AND operator.

It doesn't have any settings or configuration - just place the plugin in your `/wp-content/plugins/` folder, activate
the plugin through the 'Plugins' menu, and searches that have more than one word will start returning posts that contain
one (or more) of the words instead of just posts that contain every one of the words.


Download
--------
Download a zip archive of the plugin [here][1].

[1]: https://github.com/TheMonkeys/WordPress-Any-Word-Search/archive/master.zip

Contributing
------------
In lieu of a formal styleguide, take care to maintain the existing coding style.
Please work in a branch so that you can squash your commits into a single commit as you merge into master.

Deploying to WordPress Plugin Directory
---------------------------------------
You would have already cloned the repo from github:

    git clone https://github.com/TheMonkeys/WordPress-Any-Word-Search.git

### Configuring the Subversion "remote"
To be able to deploy to the WordPress Plugin Directory you'll need to tell git about the subversion repo. This only
needs to be done once on your working copy.

_Note: The -r689532 in the fetch command below is the first revision of our plugin. If you leave that out Git will have
to search through the entire history of the repository. That’s over 500,000 revisions._:

```bash
    cd WordPress-Any-Word-Search/
    git svn init --stdlayout --no-minimize-url --username=${YOUR_WORDPRESS_ORG_USERNAME} http://plugins.svn.wordpress.org/any-word-search/
    git svn fetch -r689532:HEAD
```

### Pushing to Subversion
Now follow steps 5 and on from http://wp.tutsplus.com/tutorials/plugins/publishing-wordpress-plug-ins-with-git/:

```bash
    git checkout master
    git merge --squash work
    git commit -a -m "Your commit message here"
    git branch -D work
    git push -u origin master
    git svn rebase
    git svn dcommit
    git svn tag "2.0"
```

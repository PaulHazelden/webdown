# webdown

Building a Markdown and GitHub driven textfile based website generator

## Concept

Build a community website engine using Markdown, based on text files stored and version controlled in GitHub.  

The aim of this project is to create a way to build and maintain a community website which is simple and transparent, built in a modular fashion with well-defined interfaces between the various parts.

Two basic programs are needed: one to create and maintain the various parts of the site, and the other to generate the pages. Two subsidiary programs can be identified at this stage: an internal consistency checker, which we will need to run as a stand-alone tool sometimes; and probably a bank account query tool to check whether a membership payment has been received from a specified User.

The original plan was to use GitHub to generate the file version meta data and host the web site.  However, GitHub (unlike a version control tool I used in the past) does not enable version details to be included within the files, and GitHub does not enable PHP to be executed in its pages, so it cannot host the web site.  So GitHub is looking less ideal as a tool here.  But we started down this route, so let's continue in this direction for now. And it is a good way to share progress.

The page generatiion is relatively straightforward, so let's concentrate on that initially.  Once the pages can be generated from the source files, then we will have proved the concept, and can focus on the more challenging task of generating and maintaining the source files.


## Background

The project arose out of thinking about the requirements for a community website for  '[Just Human?](https://just-human.net/ "'Just Human?' website")', and builds on ideas which were successfully used years ago to build an application generator for a software house.

## Further Details

The project documentation can be found in the 'doc' directory.  The most important details are in the  [Overview](doc/jh-overview.md "Project Overview").

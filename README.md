# webdown
Building a Markdown and GitHub driven textfile based website generator

## Concept

Build a community website engine using Markdown, based on text files stored and version controlled in GitHub.  Two basic programs are needed: one to create and maintain the various parts of the site, and the other to generate the pages and ensure internal consistency within the site. Two subsidiary programs can be identified at this stage: an internal consistency checker, which we will need to run as a stand-alone tool sometimes; and probably a bank account query tool to check whether a membership payment has been received from a specified User.

Every unit of content will initially be owned by its creator; the owner of an article or blog can invite other people (defined as the members of a Group) to share the writing and editing; authorised System Administrators can edit any content.  The ownership (and the responsibility for its maintenance) of an article can be passed on to another member - with their permission, of course.

An editor of any unit can restore any previous version; the version of the unit (and the latest version, if that differs) will be displayed; 

The page content is stored in Markdown; the page structure and site structure is stored in text based tables (possibly in CSV - easier to parse than Markdown?); element style uses standard CSS.

## Background

The project arose out of thinking about the requirements for a community website for  '[Just Human?](https://just-human.net/ "'Just Human?' website")', and builds on ideas which were successfully used years ago to build an application generator for a software house.

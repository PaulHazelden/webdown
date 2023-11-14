# JH Overview

## Concept

Build a community website engine using Markdown, based on text files stored and version controlled in GitHub.  Two basic programs are needed: one to create and maintain the various parts of the site, and the other to generate the pages and ensure internal consistency within the site. Two subsidiary programs can be identified at this stage: an internal consistency checker, which we will need to run as a stand-alone tool sometimes; and probably a bank account query tool to check whether a membership payment has been received from a specified User.

Every unit of content will initially be owned by its creator; the owner of an article or blog can invite other people (defined as the members of a Group) to share the writing and editing; authorised System Administrators can edit any content.  The ownership (and the responsibility for its maintenance) of an article can be passed on to another member - with their permission, of course.

An editor of any unit can restore any previous version; the version of the unit (and the latest version, if that differs) will be displayed; 

The page content is stored in Markdown (see below); the page structure and site structure is stored in text based tables (possibly in CSV - easier to parse than Markdown?); element style uses standard CSS.

Page structure is determined by page type, and a few standard page types are provided by default.

The public requirements are documented on the [Site Functionality](https://just-human.net/admin-discussion/site-functionality "Site Functionality") page of the current website; some more principles and thoughts on implementation are given in the document, '[Towards a Platform for Just Human?](Towards_A_Platform.md)'.

Web pages will be assembled from their constituent parts as they are required; this should be fairly straightforward.  The complex task lies in building those components so they are ready to be displayed: the core tasks are to open a Markdown file (or create a new one), edit the file; and each time the file is saved to GitHub, (1) write it to GitHub, and (2) run Pandoc to convert it to HTML. There will also be a need to hide and delete components.

Web pages can be moved and renamed (but probably only by a system administrator - we don't want this to happen too often); the constituents of the page will remain attached to the page.  We don't need very sophisticated editing tools here, as anything beyond the standard operations can be undertaken in a plain text editor by a site administrator.

When a page is moved or renamed, the page content is moved to the new file system location, and a page stub is provided, with a link to the new page.  This way, all internal links automatically follow the page to its new name and/or location, and external links into the site will continue to work.

If someone wants to create a new page with the same name in the same location as a moved or renamed page, this will be handled like any other duplicate name: a new page ID is created, and the name in the file system will have a '-version_number' appended to the name,


## Standard Building Blocks

Page Types:
* system;
* conversation;
* article;
* blog;
* survey/questionnaire;
* generated; and
* administration.

Content types:

* articles;
* blogs;
* posts in a discussion;
* comments on articles, blogs and other comments; and
* responses to requests for feedback.


## Indexes

### Page Index
Every page has two identities: an internal reference (in effect, a database key), and an external name and location in the tree-based file structure.  Hyperlinks within the site use the internal reference, so pages can be moved without breaking any links.

The key details of every page are held in a table (or, probably, a series of tables) called the *Page Index* which points to the current page file name and location.

The Page Index is a file (eventually, a series of files), which contains for each page on the site the internal reference and the current file name and location for that page.

The size of the Page Index needs to be determined by performance considerations: if the page access starts to be significantly delayed once the Index grows to 500 entries, then a new Index will be created for every 500 pages.

Each line of the Page Index simply contains the page reference location: for example, "59, blog/27/23/8", which would be the 8th blog entry in 2023 for User number 27, and identifies this as page 59.


### User Index

Every User has two identities: an internal reference, and an external ID, both of which are unique, but the reference is a system-generated number and the ID is a User-chosen string.

The User Index is a file (or, like the Page Index, a series of files) which contains for each User the internal reference and their personal details:

* User Reference
* User ID (sometimes called 'Username')
* Authorisation level
* Real name
* 5 digit (?) random generated security code
* Email address
* Alternate access details
* Hashed password

Some Users are site administrators; presumably there will be the need for several levels of administration permissions, which will be indicated by their authorisation level.

### Group Index

Users can form groups.  Each group will have one or more administrators plus an arbitrary number of ordinary members. A User will become a member of a Group if they want to join, and an Administrator agrees (or the other way round). A User can allow the members of a Group they administer to edit a page they own.

The Group Index is a file (or, like the Page Index, a series of files) which contains for each Group the reference numbers of the administrators and members:

* Group Reference
* One or more administrator User References
* "M"
* Zero or more member User References

At present, we are not thinking of enabling a Group to include other Groups as a members.  If the Groups take off, this would probably be appreciated, but it significantly increases the conceptual complexity.

As a compromise, perhaps we enable two kinds of Group: one (a 'User Group') which can be set up by a User and  contains only Users, and one (a 'Group Group') which can only be set up by a System Administrator, to ensure that it does not create any circular references, and can contain both Users and User Groups.

### Tag Index

We probably need to give this a bit more thought, but as a start...

All the Tags starting with the same letter will be in alphabetic sequence within a single fle.  In those files, the tag will be followed by a list of Pages pointed to by that Tag, and identified by the Internal Reference (or possibly Page ID).

## Money

Instead of interfacing with an online payment tool as we do at present, it would be simpler and cheaper if we ask every member to set up a standing order, and give them a customer reference to quote which we can use to identify who the money is coming from. (This is the thinking behind the random security code in the User data, so we can ensure it is the correct person - but, really, do we care if someone fraudulently pays for someone else's membership?)

This implies that the new member signup process will need to access the bank details and check whether the standing order has arrived; from a security perspective, should this be a standalone program which has no user interface?




## Markdown

We need to identify the precise dialect of Markdown to be used.  Is [Common Mark](https://commonmark.org/ "Common Mark") suitable?

As a start, we need a checklist of required functionality.

* Front matter - provided in some dialects, but what exactly do we need here?  An initial brainstorm suggests the following.
  * Page ID
  * Author (User Reference as a minimum, possibly with User ID)
  * Create date and time
  * Last changed date and time
  * Document Title (to avoid the need, as in this document, to use the level 1 heading to indicate the document title)
  * Document Sub-title, if there is one
* Hyperlinks need to specify whether they open in the current tab or a new one.
* Internal hyperlinks are needed, to navigate within a unit of content.
* We probably need to be able to specify basic image details (such as size and alignment)



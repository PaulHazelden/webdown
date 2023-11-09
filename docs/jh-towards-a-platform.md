::: {title="header"}
\
:::

**Towards a platform for** ***Just Human?***

Version 0.3, October 2023

**Contributors:** Paul Hazelden, Brian Monahan

# Overall Purpose and Philosophy

The purpose of this *platform* is to host conversations, discussions and interactions
between a large number of users, each of whom typically participates in
a wide range of groups or communities. (A platform is an architectural framework within which systems interact.   Systems that participate within or upon a platform typically conform to a number of architectural requirements e.g. provide certain kinds of interfaces etc.)

The overall objective is to, over time, establish a corpus/web of
established documents which have acquired stability and have some
community support, representing some degree of consensus. Of course,
what this consensus is will naturally change over time.

It is envisaged that these interactions consist of an exchange of
documents to establish and contribute to ongoing discussions, both
within and between various communities. These documents will typically
aspire to be quite substantial (i.e. *long-form*) contributions and be
written with the aim of sustaining rational, critical debate and
discussion.

\[Paul: I think we need to define what we mean by '*long-form*'... in my
head, we are talking about maybe 2-3,000 words, not a book. In other
words, something which people can reasonably read and respond to in a
single sitting. And, while they would *aspire* to be substantial, I
think it is reasonable for people to post a 'holding page', maybe a
paragraph or two, giving the outline or core thought of a proposed
article, with the intention of gathering some initial responses and
suggestions.

Also, I would like the documents to aspire to be both substantial and
atomic - dealing with just one topic, or one aspect of a larger topic.
We can have a more productive conversation when there is a clear
focus.\]

## Criticism is essential for truth to emerge

Critical response to documents and views is all part of the process of
eventually arriving at established views and opinions. Both dissent and
agreement will be commonplace. Although freedom of creative expression
is strongly encouraged, this must not be abused - since freedom of
speech is not a freedom to abuse.

All users have a right to give their own opinions and views -- however
obscure, illogical and awful they may appear to one. Opinions and views
may be unpopular -- in one's view -- but that doesn't mean they don't
deserve representation in some form. That being said, it is also the
case that any opinion worth expressing in a rational manner is also
worth saying in a dignity-affirming manner. Speech designed to incite
hatred directed at any group or individual is entirely unacceptable and
cannot be tolerated.

# Technical Requirements and Principles 

We envisage a web platform with the following layered "feature"
requirements, starting with the most basic. Each requirement includes
all its predecessors. This means we start with simple requirements and
continue onwards. Implementations at a particular level are called
*apps* and necessarily implement all requirements at this and prior
levels.

1.  **Document Management:** The app must provide a way to manage and curate named documents. This typically means **adding** documents,  **retrieving/serving** documents, and **removing** documents.  Documents are organised within named folders/directories. The app supports the use of *sharing* both folders and documents via *links*. Folders and documents are known as *items*.

*Notes*:

a.  Links are required to be *acyclic* guaranteed e.g. attempts to
    create links resulting in cyclic paths are actively prevented.
    \[Paul: I'm not sure why this is important -- or even desireable?
    Surely we do want two articles to be able to make reference to each
    other? We do need acyclic navigation -- a traditional 'tree'
    structure' -- but that is not the same as providing internal links
    between articles and pages.\]

b.  The app may not possess the ability 
to *generate* or *edit* a
    document to produce a subsequent document. \[But see section 6
    below.\] (The issue here is that generating/editing content is rather specialist and would require a complex (and expensive) edit widget to be consistently supported across the piece. Would not being able to edit directly in the app be such hardship? Hopefully, can keep the editing supported to user comments and so on … which doesn’t require Rich Text support.)

c.  At this level, document management may be *agnostic* to versioning
    and the notion of *revision*.

d.  At this level, the app may typically be single-user, although
    multi-user support must be feasible.

**Basic metadata searching for items:** The app must provide a way to
search for *items* (e.g. folders and documents), based on certain
*metadata* characteristics that they possess.

*Notes*:

a.  At this level, searching and selection are typically restricted to
    *external* general characteristics of items (e.g. name, size,
    modified date-time, etc.) -- and may result in finding no items, one
    item or many items.

b.  The *range* of any search is naturally given through the matching of
    metadata attributes e.g. path information, names, size, MIMEtype,
    etc.

c.  Secure hashes are required as metadata for all items. However, due
    to the basic properties required for a secure hash, the secure hash
    of any item cannot logically be embedded within *themselves* -- they
    must be located alongside, perhaps via a suitable *annotation*, to
    ensure independent verification of the secure hash.

d.  At this level, the app may typically be single-user, although
    multi-user support must be feasible.

**Version control of items:** The app must support the notion of an item
being a *version* of another item (preserving the same kind). The notion
of a version is simply a *one-many* *binary relationship* between items
-- it may or may not have been established by updating one item into
another item. However, it is the case that one of the items will be the
*source* (e.g. dated earlier) and the other item will be a *revision*
(e.g. dated later). Note that *any* two items of the same kind (but
having different times) could potentially be versions of each other.
Each item can have at most one source, but it may typically have many
revisions. Additionally, the (*principal*) *name* of an item is
preserved from version to version - but the *full name* of each item
contains both its principal name and the exact version information that
is necessarily sufficient to fully determine its unique name.

Naturally, the app should additionally support searching involving
version information, seeking particular versions and so on. Given a
particular item, it is possible to recover the version information and
determine its source and any immediate, direct revisions. Given a
particular date-time and principal name, the app can support the
reconstruction of the context for that item, if it exists.

*Notes*:

a.  At this level, although version control conceptually amounts to the
    *annotation* of version information to items, it requires
    significant effort for efficient implementation. Version control is
    primarily a way to provide additional organisational structure to
    allow historical reconstruction of the *evolution* of a particular
    set of items over a period of time.

b.  Partial implementation involving version control just for documents
    rather than folders may be acceptable -- but obviously does not
    count as full implementation of the requirement.

c.  At this level, the app may typically be single-user, although
    multi-user support must be feasible.

**Searching and selection within content:** The app must provide a way
to search and select within and across the content, for all content
types supported. This may be quite challenging but essentially requires
the content to be textually extractable and made available in a
searchable format. For example, PDF content needs to be available and
the bare words indexable. (Python libraries do exist for some of this, I understand.)

*Notes*:

a.  It is hopefully possible to avoid having to provide a complex *edit
    widget* in the app implementation to provide this capability. In
    other words, it is possible to extract supported content in a form
    that allows some reasonable indexing of the content.

b.  At this level, the app may typically be single-user, although
    multi-user support must be feasible.

**Multi-user:** The app must support multiple users and their
interactions. It is only at this point that some kind of non-specialist
user interface needs to be available so that documents and their
versions from other users can be accessed and referred to.

The basic idea is that each user has their own login and their own space
in which to keep their own items. Users may also access and read other
users' items shared with them. Items may also be globally *published*
and made accessible by *any* user. \[Paul: not sure about this: I have
been working on the assumption that all content on the site (apart from
some obvious administrative bits) will be public - anyone can talk with
anyone else, but not in secret. Or is this just a way of enabling people to develop draft versions of their work before they go public?\]

All services already provided must be available in some manner for
general users.

Admin users will require privileged access to make repairs, reconfigure
component systems and such like. Admin actions are audited and are
subject to review.

Multi-user support implies a fully concurrent, distributed mode of
operational activity. A fully Internet-enabled app is required.

\[Paul: I have assumed that the users must be able to create and join
groups, work on content and discuss ideas within a group; perhaps this
functionality is not actually required? But it seems like enabling some
people to collaborate in a meaningful way would be helpful. The main
value of enabling group membership lies not in permitting only selected
people to contribute, but in enabling only selected people to be
notified of changes - but perhaps enabling people to be notified of
changes to a page would be sufficient? This would not facilitate a group
working on a linked set of pages, but perhaps that is not a sufficiently
significant scenario?\]

*Notes*:

a.  At this level, multi-user interaction needs to be supported as the
    following levels only make sense in the context of having multi-user
    support.

\
\

6.  **User comments and annotations to content:** **\<More Here\>**

It is essential for users to be able to post comments on articles, and
edit those comments. Is it assumed that this will be achieved solely by
creating a new document and uploading it into a 'comment' space?

If documents are purely uploaded documents, then only the author can
change and upload a revised version, so annotations are not possible.

The 'like' button is unhelpful, but some kind of simple reaction would
be useful. In this context, the main danger of the 'like' button is not
present, as we will not be choosing what content to present to the User.

So the question is: what do we want to replace the 'like' button?
Presumably there needs to be an array of response options, for example:

-   I fully agree with you.

-   I mostly agree with you - there are minor details I disagree with.
    (Optional: and these are the details.)

-   I partly agree with you - there are significant details I disagree
    with. (Optional: and these are the details.)

-   I mostly disagree with you - there are minor details I agree with.
    (Optional: and these are the details.)

-   I fully disagree with you.

Also:

-   I think the content effectively covers the subject.

-   I think the content mainly covers the subject, but some minor
    details are missing. (Optional: and these are the details.)

-   I think the content partly covers the subject, but some significant
    details are missing. (Optional: and these are the details.)

7.  **Discussions**

There must be some way for the users to communicate with each other,
apart from posting and commenting on documents.

There should be a mechanism for users to be notified of new
contributions to a selected discussion.

8.  **User Surveys**

A previous set of requirements described a survey facility, to enable
people to create a survey to discover the opinion of the site members.
Responding to these surveys would, of course, be voluntary; it is not
clear exactly how people would be notified that a survey had been
created which they could choose to participate in.

However, the expectation was that there would be one survey which all
members would be expected to complete, providing their basic demographic
and equalities details, so we can know who the members are - and,
perhaps, enable us to work on recruiting under-represented groups. There
might also be an annual 'how are we doing?' survey which all members
would be asked to complete.

9.  **Membership Fee Collection**

The need for a membership fee to be charged by default has been
described elsewhere. The site admin must be able to add people without a
fee, and to add people who have a valid reason for not displaying their
real name, so we need a mechanism for people to be able to request this
support.

10. ...

# Architectural alternatives and principles

-   3 tier logical architecture

    a.  User interface

    b.  Middleware

    c.  Storage/database

-   Different approaches:

    a.  Can we tailor an already existing system which does most of what is needed?

    b.  Failing that, can we build by mashing-up several big components together with some glue code (Python/Javascript)?

    c.  Failing that, how much do we have to build ourselves?

    d.  ...

**\<TO BE CONTINUED\>**


::: {title="footer"}
[5]{style="background: #c0c0c0"}
:::

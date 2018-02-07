/*jshint esversion: 6 */
/* global $ */
(function () {
    "use strict";

    const blogsTable = $("#blogsTable"),
        blogsTbody = $("#blogsTable tbody"),
        backToBlogs = $("#backToBlogs"),
        postsContainer = $("#postsContainer"),
        postsHeader = $("#postsContainer h2"),
        postsDiv = $("#postsDiv");

    let postArray = [],
        numOfPosts = 3,
        startIndex = 0,
        currentIndex = 0;


    $.getJSON("https://jsonplaceholder.typicode.com/users", (blogs) => {
        blogs.forEach((blog) => {
            $(`<tr>
                <td> ${blog.name}</td>
                <td>${blog.website}</td>
                <td>${blog.company.name}</td>
              </tr>`)
                .appendTo(blogsTbody)
                .data('blog', { id: blog.id, name: blog.name });
        });
    });

    function displayPosts() {
        postsDiv.empty();
        startIndex = currentIndex;
        for (let i = 0; i < numOfPosts && currentIndex < postArray.length; i++) {
            displayPost(postArray[currentIndex++]);
        }
    }

    function displayPost(postOBJ) {
        let post = $(`<div><h2>${postOBJ.title}</h2><p>${postOBJ.body}</p><button>show comments</button></div>`)
            .appendTo(postsDiv)
            .data('postId', postOBJ.id),
            postId = post.data('postId'),
            commentsButton = post.find('button'),
            commentsContainer = $('<div></div>'),
            commentsDisplay = $('<div></div>'),
            gotComments = false,
            displayingComments = false;

        commentsButton.click((() => {
            if (!gotComments) {
                $.getJSON("https://jsonplaceholder.typicode.com/comments", { postId: postId }, (comments) => {
                    gotComments = true;
                    commentsContainer.appendTo(post);
                    commentsDisplay.appendTo(commentsContainer).append('<h2>Comments</h2>');
                    comments.forEach((comment) => {
                        displayComment(commentsDisplay, comment);
                    });

                    addCommentSetup(commentsContainer, commentsDisplay, postId);

                }).fail((jqxhr) => {
                    alert("Error: " + jqxhr.responseText);
                });
            }
            if (!displayingComments) {
                commentsContainer.show();
                commentsButton.text('hide comments');
                displayingComments = true;
            } else {
                commentsContainer.hide();
                commentsButton.text('show comments');
                displayingComments = false;
            }
        }));
    }

    function displayComment(commentsDisplay, comment) {
        commentsDisplay.append(`<h4>${comment.name}</h4><p>${comment.body}</p><hr/>`);
    }

    function addCommentSetup(commentsContainer, commentsDisplay, postId) {
        commentsContainer.append(`<h3>Add a Comment</h3>comment name <input/><br/>comment<br/>
            <textarea rows="6" cols="100"></textarea><br/><button>add comment</button>`);
        let commentName = commentsContainer.find('input'),
            commentBody = commentsContainer.find('textarea');

        commentsContainer.find('button').click(() => {
            fetch("https://jsonplaceholder.typicode.com/comments", {
                method: 'POST',
                body: JSON.stringify({
                    name: commentName.val(),
                    body: commentBody.val(),
                    postId: postId
                }),
                headers: { "Content-type": "application/json; charset=UTF-8" }
            }).then(response => response.json())
                .then((data) => {
                    displayComment(commentsDisplay, data);
                    commentName.val('');
                    commentBody.val('');
                });
        });
    }

    blogsTbody.click((event) => {
        let tr = $(event.target).closest('tr'),
            blogId = tr.data('blog').id;

        $.getJSON("https://jsonplaceholder.typicode.com/posts", { userId: blogId }, (posts) => {
            postArray = posts;
            displayPosts();
            blogsTable.hide();
            postsHeader.text(`${tr.data('blog').name}'s Posts`);
            postsContainer.show();
        }).fail((jqxhr) => {
            alert("Error: " + jqxhr.responseText);
        });
    });

    $("#prevButton").click(() => {
        if (currentIndex > numOfPosts) {
            currentIndex = startIndex - numOfPosts;
            displayPosts();
        }
    });

    $("#nextButton").click(() => {
        if (currentIndex < postArray.length) {
            displayPosts();
        }
    });

    backToBlogs.click(() => {
        postsContainer.hide();
        postsDiv.empty();
        blogsTable.show();
        startIndex = 0;
        currentIndex = 0;
    });
}());
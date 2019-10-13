import React, { Component } from "react";
import ReactDOM from 'react-dom';


export default class Post extends Component {
    state = {
      hasErrors: false,
      post: {}
    };

    componentDidMount() {
        axios.get(`/api/posts/${this.props.slug}`)
        .then(function (response) {
            this.setState({ post: response });
        })
        .catch(function (error) {
            this.setState({ hasErrors: true });
        });
    }

    render() {
        return (
            <div className="">
                This is a singlre post
            </div>
        );
    }
}

const elements = document.getElementsByClassName('single-post-js');

$('.single-post-js').each(function(i, obj) {
    ReactDOM.render(<Post slug={obj.dataset.slug} />, obj);
});

import React, { useState, useEffect } from "react";
import axios from "axios";
import ReactDOM from 'react-dom';

const PostForm = (props) => {
  const [hasError, setErrors] = useState(false);
  const [post, setPost] = useState({});

  const fetchData = async () => {
    const res = await axios.get(`/api/posts/${props.slug}`);
    let { data } = res.data;
    setPost(data);
  }

  useEffect(() => {
    fetchData()
  }, [])

  return (
    <div className="react-single-post">
        <h1 className="title">{post.title}</h1>
        {post.images && post.images.map((image) => (
          <img
            key={image.id}
            src={image.url}
            className="featured-image"
          />
        ))}
         {post.content &&post.content.split('\n').map(function(item, key) {
        return (
            <span key={key}>
            {item}
            <br/>
            </span>
        )
        })}
    </div>
  );
};

export default PostForm;

$('*[data-react-render="post-form"]').each(function(i, obj) {
    ReactDOM.render(<Post slug={obj.dataset.slug} />, obj);
});

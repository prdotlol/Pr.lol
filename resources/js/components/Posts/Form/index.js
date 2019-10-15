import React, { useState, useEffect } from "react";
import axios from "axios";
import ReactDOM from 'react-dom';
import {useForm, useField} from '@shopify/react-form';

const PostForm = () => {
    const {fields, submit, submitting, dirty, reset, submitErrors} = useForm({
        fields: {
            title: useField('some default title'),
        },
        onSubmit: fieldValues => {
            return {status: 'fail', errors: [{message: 'bad form data'}]};
        },
        });

        const loading = submitting ? <p className="loading">loading...</p> : null;
        const errors =
        submitErrors.length > 0 ? (
            <p className="error">{submitErrors.join(', ')}</p>
        ) : null;

        return (
        <form onSubmit={submit}>
            {loading}
            {errors}
            <div>
            <label htmlFor="title">
                Title <input {...fields.title} />
            </label>
            </div>
            <button type="button" disabled={!dirty} onClick={reset}>
            Reset
            </button>
            <button type="submit" disabled={!dirty} onclick={submit}>
            Submit
            </button>
        </form>
        );
};

export default PostForm;

$('*[data-react-render="post-form"]').each(function(i, obj) {
    ReactDOM.render(<PostForm slug={obj.dataset.slug} />, obj);
});

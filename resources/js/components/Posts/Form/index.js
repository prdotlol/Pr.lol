import React, { useState, useEffect } from "react";
import axios from "axios";
import ReactDOM from 'react-dom';
import {useForm, useField} from '@shopify/react-form';
import { Editor, EditorState } from "draft-js";
import Uppy from '@uppy/core';
import Tus from '@uppy/tus';
import { DragDrop } from '@uppy/react'
import Select from 'react-select';
import chroma from 'chroma-js';
import PostTypeSelect from './components/PostTypeSelect';

import "draft-js/dist/Draft.css";
import '@uppy/core/dist/style.css'
import '@uppy/drag-drop/dist/style.css'

const PostForm = () => {
    const [postState, setPostState] = useState({
        title: '',
        content: '',
    });

    const handleTypeChange = (selectedOption) => setTypeState(selectedOption);

    const [editorState, setEditorState] = React.useState(
        EditorState.createEmpty()
    );

    const handlePostChange = (e) => setPostState({
        ...postState,
        [e.target.name]: [e.target.value],
    });

    const uppy = Uppy({
        meta: { type: 'avatar' },
        restrictions: { maxNumberOfFiles: 1 },
        autoProceed: true
      })

    uppy.use(Tus, { endpoint: '/upload' })

    uppy.on('complete', (result) => {
    const url = result.successful[0].uploadURL
    store.dispatch({
        type: SET_USER_AVATAR_URL,
        payload: { url: url }
    })
    })

    return (
        <div className="form">
            <form>
                <div className="input-header">
                    <input
                        type="text"
                        name="owner"
                        className="input-title"
                        placeholder="Post title"
                    />
                    <PostTypeSelect />
                </div>
            </form>


            <div className="DashboardContainer">
                <DragDrop
                    uppy={uppy}
                    locale={{
                    strings: {
                        // Text to show on the droppable area.
                        // `%{browse}` is replaced with a link that opens the system file selection dialog.
                        dropHereOr: 'Drop here or %{browse}',
                        // Used as the label for the link that opens the system file selection dialog.
                        browse: 'browse'
                    }
                    }}
                />
            </div>

            <div className="UppyModalOpenerBtn"></div>


            <Editor
                editorState={editorState}
                onChange={setEditorState}
                placeholder="Start typing here..."
            />
        </div>
    );
};

export default PostForm;

$('*[data-react-render="post-form"]').each(function(i, obj) {
    ReactDOM.render(<PostForm slug={obj.dataset.slug} />, obj);
});

import React, { useState, useEffect } from "react";
import ReactDOM from 'react-dom';
import axios from "axios";
import Select from 'react-select';
import AsyncSelect from 'react-select/async';
import chroma from 'chroma-js';

const PostTypeSelect = () => {
    const [typeState, setTypeState] = useState({
        value: '',
        label: '',
        color: '',
    });

    const handleTypeChange = (selectedOption) => setTypeState(selectedOption);

    const types = [
        { value: 'chocolate', label: 'Chocolate', color: '#999' },
        { value: 'strawberry', label: 'Strawberry', color: '#999' },
        { value: 'vanilla', label: 'Vanilla', color: '#999' },
    ];

    const dot = (color = '#ccc') => ({
        alignItems: 'center',
        display: 'flex',

        ':before': {
          backgroundColor: color,
          borderRadius: 10,
          content: '" "',
          display: 'block',
          marginRight: 8,
          height: 10,
          width: 10,
        },
      });

    const colourStyles = {
    control: styles => ({ ...styles, backgroundColor: 'white', borderRadius: '0 0 5px 5px', outline: 'none'}),
    option: (styles, { data, isDisabled, isFocused, isSelected }) => {
        const color = chroma(data.color);
        return {
        ...styles,
        backgroundColor: isDisabled
            ? null
            : isSelected
            ? data.color
            : isFocused
            ? color.alpha(0.1).css()
            : null,
        color: isDisabled
            ? '#ccc'
            : isSelected
            ? chroma.contrast(color, 'white') > 2
            ? 'white'
            : 'black'
            : data.color,
        cursor: isDisabled ? 'not-allowed' : 'default',

        ':active': {
            ...styles[':active'],
            backgroundColor: !isDisabled && (isSelected ? data.color : color.alpha(0.3).css()),
        },
        };
    },
    input: styles => ({ ...styles, ...dot() }),
    placeholder: styles => ({ ...styles, ...dot() }),
    singleValue: (styles, { data }) => ({ ...styles, ...dot(data.color) }),
    };

    const [options, setOptions] = useState([
        { value: 'chocolate', label: 'Chocolate', color: '#999' },
        { value: 'strawberry', label: 'Strawberry', color: '#999' },
        { value: 'vanilla', label: 'Vanilla', color: '#999' },
    ]);

    const fetchData = async () => {
        const res = await axios.get(`/api/posttypes`);
        let { data } = res.data;
        setOptions(data);
    }

    useEffect(() => {
        fetchData()
    }, [])

    const CustomOption = ({ innerProps, isDisabled, label, data }) =>
    !isDisabled ? (
      <div className="react-select-custom-option" {...innerProps}>
          <div className="left"><div className="dot" style={{ backgroundColor: data.color }}>{ label.charAt(0) }</div></div>
          <div className="right">
              <div className="label">{label}</div>
              <div className="des">{data.des}</div>
          </div>
      </div>
    ) : null;

    return (
        <Select
            value={typeState}
            onChange={handleTypeChange}
            styles={colourStyles}
            options={options}
            placeholder="Select a post type"
            components={{ Option: CustomOption }}
        />
    );
};

export default PostTypeSelect

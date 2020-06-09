const asyncPost = async (queryData) => {

    let {url,formData,method = 'POST', type = "json"} = queryData;
    const settings = {
        method: method,
        body: formData,
        headers: {
            accept: "application/json",
            "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
        }
    };

    const fetchResponse = await fetch(`${url}`, settings);
    const data = type !== 'json' ? await fetchResponse.text() : await fetchResponse.json();

    if (!fetchResponse.ok){
        return await Promise.reject(data)
    }

    return data;
};

const asyncGet = async (url, type = 'json') => {

    const fetchResponse = await fetch(`${url}`);
    const data = type !== 'json' ? await fetchResponse.text() : await fetchResponse.json();

    if (!fetchResponse.ok){
        return await Promise.reject(data)
    }

    return data;
};

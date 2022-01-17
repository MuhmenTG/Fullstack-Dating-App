export async function serverHttpRequest(url, methodType, data, key) {
    try 
        {
       
        let response;
        if(data != undefined && key != undefined)
        {
            response = await fetch(url, {
                method: methodType,
                body: JSON.stringify({ key: data })
            });
        }
        else if(data != undefined){
            response = await fetch(url, {
                method: methodType,
                body: JSON.stringify(data)
            });
        }
        else{
            response = await fetch(url, {
                method: methodType
            });
        }
        return await response.json();         
    } 
    catch (error) 
    {
        console.log(error);
    }
}
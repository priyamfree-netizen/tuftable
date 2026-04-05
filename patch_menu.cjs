const fs = require('fs');

try {
    let js = fs.readFileSync('public/landing_new_assets/index-3f204186.js', 'utf8');

    // Remove Demos dropdown item from array
    // Finding something like: {id:1,title:"Demos",dropdown:[...]}
    js = js.replace(/\{id:1,title:"Demos",dropdown:\[.*?\]\},/g, '');
    
    // Replace "Pages" dropdown with Blog Link
    // Finding something like: {id:3,title:"Pages",dropdown:[...]}
    js = js.replace(/\{id:3,title:"Pages",dropdown:\[.*?\]\}/g, '{id:3,title:"Blog",path:"/blog"}');
    
    // Replace "Contact" dropdown with Contact Link
    js = js.replace(/\{id:4,title:"Contact",dropdown:\[.*?\]\}/g, '{id:4,title:"Contact",path:"/contact"}');

    // Replace the URL of "Login" button. 
    // Notice: usually Login is an object or hardcoded `href:"#"` for the login text.
    // Instead of regex hacking the logic component, we can replace the text "Sign up free" and "Login" specifically if they appear in JSX props:
    js = js.replace(/"SignUp free"/g, '"Dashboard"').replace(/"Sign up free"/g, '"Dashboard"');
    
    // We can also patch exactly the href values for those buttons. Usually `href:"#"` near Login.
    js = js.replace(/href:"#",className:"btn-masco btn-masco--header/g, 'href:"/login",className:"btn-masco btn-masco--header');

    fs.writeFileSync('public/landing_new_assets/index-3f204186.js', js, 'utf8');
    console.log("Successfully patched index-3f204186.js directly.");
} catch(e) {
    console.error(e);
}

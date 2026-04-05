const fs = require('fs');

try {
    let original = fs.readFileSync('public/landing_new_assets/index-3f204186.js', 'utf8');
    let js = original;

    // Remove Demos dropdown item from array
    // React navigation array in the minified bundle usually looks like {id:X,title:"Demos",dropdown:[...]}
    js = js.replace(/\{id:\d+,title:"Demos",dropdown:\[.*?\]\},?/g, '');
    
    // Replace "Pages" dropdown with Blog Link
    js = js.replace(/\{id:\d+,title:"Pages",dropdown:\[.*?\]\}/g, '{id:3,title:"Blog",path:"/blog"}');
    
    // Replace "Contact" dropdown with Contact Link
    js = js.replace(/\{id:\d+,title:"Contact",dropdown:\[.*?\]\}/g, '{id:4,title:"Contact",path:"/contact"}');

    // Replace "Sign up free" with "Dashboard"
    js = js.replace(/"SignUp free"/g, '"Dashboard"').replace(/"Sign up free"/g, '"Dashboard"');
    
    // Fix href links for login
    // Usually defined as href:"#",className:"btn-masco btn-masco--header"
    js = js.replace(/href:"#",className:"btn-masco btn-masco--header/g, 'href:"/login",className:"btn-masco btn-masco--header');

    // Remove "Masco" Logo Text
    js = js.replace(/"Masco"/g, '""');

    if (js !== original) {
        fs.writeFileSync('public/landing_new_assets/index-3f204186.js', js, 'utf8');
        console.log("Successfully patched index-3f204186.js. Differences detected and saved!");
    } else {
        console.log("No differences detected. The regex might not be matching the minified strings.");
    }
} catch(e) {
    console.error(e);
}

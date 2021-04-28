# jsonDB.php
The simplest/easiest  way to keep variables

```javascript
const { getJSON, saveJSON } = require('./jsonDB.js')

module.exports.msgcont = (message) => new Promise(async(re,err)=>{
    var db = await getJSON('db.json');
    if(!db.users[message.from]) db.users[message.from] = {'msgcont':0};
    db.users[message.from].msgcont += 1;
    saveJSON('db.json', db);
    re(db)
})
```

```javascript
var request = require("request");

module.exports.getJSON = (name) => new Promise(async(re,err)=>{
    var options = {method: 'GET', url: `http://localhost/jsonDB/${name}`};

    request(options, function (error, response, body) {
    if (error) throw new Error(error);

    re(JSON.parse(body))
    })
})
module.exports.saveJSON = (name, obj) => new Promise(async(re,err)=>{
        
var options = {
    method: 'GET',
    url: 'http://localhost/jsonDB/jsonDB.php',
    qs: {name: name},
    headers: {'content-type': 'application/json'},
    body: obj,
    json: true
  };
  
  request(options, function (error, response, body) {
    if (error) throw new Error(error);
  
    console.log(body);
    re()
  });

})
```

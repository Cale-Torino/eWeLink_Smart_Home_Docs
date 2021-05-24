# eWeLink API Reference

The eWeLink Api uses endpoints from `https://www.coolkit.cn` and recently the API calls require an `APP_ID`
and pricing of $2000.00/Year (implemented on March 1, 2021) *[CoolKit Technologies Pricing](https://github.com/CoolKit-Technologies/eWeLink-API/blob/main/en/Pricing.md)*.

A free way is implimented using *[Node-Red](https://nodered.org)* and the *[eWeLink API](https://ewelink-api.vercel.app/docs/introduction)*. I make use of this in the documentation below.

- Links
    - *[Node-Red eWeLink flow](https://flows.nodered.org/node/node-red-contrib-ewelink)*
    - *[Node-Red](https://nodered.org)*
    - *[eWeLink API](https://ewelink-api.vercel.app/docs/introduction)*
    - *[CoolKit Technologies](https://github.com/CoolKit-Technologies)*
    - *[CoolKit Technologies APICenter](https://github.com/CoolKit-Technologies/apiDocs/blob/master/en/APICenter.md)*
    - *[Example video](https://www.youtube.com/watch?v=DbBqa-rq31g)*


### 1. Install Nodejs

Download and install `Nodejs` and check the packages checkbox.

I used the windows installer for my windows server 2012 test machine.

```
https://nodejs.org
```

### 2. Check The Installation

Check that `Nodejs` and `NPM` are installed.

```
node --version && npm --version
```

### 3. install Node-Red

Install node red for windows.

```
npm install -g --unsafe-perm node-red
```

### 4. Run Node-Red

In order to run node read a `CMD` terminal must be opened and the command `node-red` can be run.

run node red.
```
node-red
```

run node red, Enables verbose output.
```
node-red -v
```

run node red, Sets the TCP port the runtime listens on. Default: 1880.
```
node-red --port PORT
```

```
node-red -p
```

Shows command-line usage help and exits.
```
node-red -?
```

### 4. Access the Flows GUI

Once Node-Red is running you can access the GUI via the link http://127.0.0.1:1880

### 5. Install Git

Now download and install `Git`. It's necessary for the eWeLink flows to work correctly.

You will not be able to install the `node-red-contrib-ewelink` flow without `Git`.

https://ottoszika.github.io/node-red-contrib-ewelink/#/installation

```
https://git-scm.com/download/win
```

### 6. Install node-red-contrib-ewelink Flow

Now you can install the node-red-contrib-ewelink flow via the palette manager or npm in the terminal.

From command line

```
npm install node-red-contrib-ewelink
```

From Node-Red

Go to Menu → Manager palette → Install and search for `node-red-contrib-ewelink` and click install.

### 7. Create Flow

You can now create flows for the eWeLink API.


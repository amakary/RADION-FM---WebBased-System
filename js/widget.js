(function (f) {
    if (typeof exports === "object" && typeof module !== "undefined") {
        module.exports = f()
    } else if (typeof define === "function" && define.amd) {
        define([], f)
    } else {
        var g;
        if (typeof window !== "undefined") {
            g = window
        } else if (typeof global !== "undefined") {
            g = global
        } else if (typeof self !== "undefined") {
            g = self
        } else {
            g = this
        }
        g.TransakSDK = f()
    }
})(function () {
    var define,
    module,
    exports;
    return (function () {
        function r(e, n, t) {
            function o(i, f) {
                if (!n[i]) {
                    if (!e[i]) {
                        var c = "function" == typeof require && require;
                        if (!f && c)
                            return c(i, !0);
                        if (u)
                            return u(i, !0);
                        var a = new Error("Cannot find module '" + i + "'");
                        throw a.code = "MODULE_NOT_FOUND",
                        a
                    }
                    var p = n[i] = {
                        exports: {}
                    };
                    e[i][0].call(p.exports, function (r) {
                        var n = e[i][1][r];
                        return o(n || r)
                    }, p, p.exports, r, e, n, t)
                }
                return n[i].exports
            }
            for (var u = "function" == typeof require && require, i = 0; i < t.length; i++)
                o(t[i]);
            return o
        }
        return r
    })()({
        1: [function (require, module, exports) {
                var objectCreate = Object.create || objectCreatePolyfill
                    var objectKeys = Object.keys || objectKeysPolyfill
                    var bind = Function.prototype.bind || functionBindPolyfill
                function EventEmitter() {
                    if (!this._events || !Object.prototype.hasOwnProperty.call(this, '_events')) {
                        this._events = objectCreate(null);
                        this._eventsCount = 0;
                    }
                    this._maxListeners = this._maxListeners || undefined;
                }
                module.exports = EventEmitter;
                EventEmitter.EventEmitter = EventEmitter;
                EventEmitter.prototype._events = undefined;
                EventEmitter.prototype._maxListeners = undefined;
                var defaultMaxListeners = 10;
                var hasDefineProperty;
                try {
                    var o = {};
                    if (Object.defineProperty)
                        Object.defineProperty(o, 'x', {
                            value: 0
                        });
                    hasDefineProperty = o.x === 0;
                } catch (err) {
                    hasDefineProperty = false
                }
                if (hasDefineProperty) {
                    Object.defineProperty(EventEmitter, 'defaultMaxListeners', {
                        enumerable: true,
                        get: function () {
                            return defaultMaxListeners;
                        },
                        set: function (arg) {
                            if (typeof arg !== 'number' || arg < 0 || arg !== arg)
                                throw new TypeError('"defaultMaxListeners" must be a positive number');
                            defaultMaxListeners = arg;
                        }
                    });
                } else {
                    EventEmitter.defaultMaxListeners = defaultMaxListeners;
                }
                EventEmitter.prototype.setMaxListeners = function setMaxListeners(n) {
                    if (typeof n !== 'number' || n < 0 || isNaN(n))
                        throw new TypeError('"n" argument must be a positive number');
                    this._maxListeners = n;
                    return this;
                };
                function $getMaxListeners(that) {
                    if (that._maxListeners === undefined)
                        return EventEmitter.defaultMaxListeners;
                    return that._maxListeners;
                }
                EventEmitter.prototype.getMaxListeners = function getMaxListeners() {
                    return $getMaxListeners(this);
                };
                function emitNone(handler, isFn, self) {
                    if (isFn)
                        handler.call(self);
                    else {
                        var len = handler.length;
                        var listeners = arrayClone(handler, len);
                        for (var i = 0; i < len; ++i)
                            listeners[i].call(self);
                    }
                }
                function emitOne(handler, isFn, self, arg1) {
                    if (isFn)
                        handler.call(self, arg1);
                    else {
                        var len = handler.length;
                        var listeners = arrayClone(handler, len);
                        for (var i = 0; i < len; ++i)
                            listeners[i].call(self, arg1);
                    }
                }
                function emitTwo(handler, isFn, self, arg1, arg2) {
                    if (isFn)
                        handler.call(self, arg1, arg2);
                    else {
                        var len = handler.length;
                        var listeners = arrayClone(handler, len);
                        for (var i = 0; i < len; ++i)
                            listeners[i].call(self, arg1, arg2);
                    }
                }
                function emitThree(handler, isFn, self, arg1, arg2, arg3) {
                    if (isFn)
                        handler.call(self, arg1, arg2, arg3);
                    else {
                        var len = handler.length;
                        var listeners = arrayClone(handler, len);
                        for (var i = 0; i < len; ++i)
                            listeners[i].call(self, arg1, arg2, arg3);
                    }
                }
                function emitMany(handler, isFn, self, args) {
                    if (isFn)
                        handler.apply(self, args);
                    else {
                        var len = handler.length;
                        var listeners = arrayClone(handler, len);
                        for (var i = 0; i < len; ++i)
                            listeners[i].apply(self, args);
                    }
                }
                EventEmitter.prototype.emit = function emit(type) {
                    var er,
                    handler,
                    len,
                    args,
                    i,
                    events;
                    var doError = (type === 'error');
                    events = this._events;
                    if (events)
                        doError = (doError && events.error == null);
                    else if (!doError)
                        return false;
                    if (doError) {
                        if (arguments.length > 1)
                            er = arguments[1];
                        if (er instanceof Error) {
                            throw er;
                        } else {
                            var err = new Error('Unhandled "error" event. (' + er + ')');
                            err.context = er;
                            throw err;
                        }
                        return false;
                    }
                    handler = events[type];
                    if (!handler)
                        return false;
                    var isFn = typeof handler === 'function';
                    len = arguments.length;
                    switch (len) {
                    case 1:
                        emitNone(handler, isFn, this);
                        break;
                    case 2:
                        emitOne(handler, isFn, this, arguments[1]);
                        break;
                    case 3:
                        emitTwo(handler, isFn, this, arguments[1], arguments[2]);
                        break;
                    case 4:
                        emitThree(handler, isFn, this, arguments[1], arguments[2], arguments[3]);
                        break;
                    default:
                        args = new Array(len - 1);
                        for (i = 1; i < len; i++)
                            args[i - 1] = arguments[i];
                        emitMany(handler, isFn, this, args);
                    }
                    return true;
                };
                function _addListener(target, type, listener, prepend) {
                    var m;
                    var events;
                    var existing;
                    if (typeof listener !== 'function')
                        throw new TypeError('"listener" argument must be a function');
                    events = target._events;
                    if (!events) {
                        events = target._events = objectCreate(null);
                        target._eventsCount = 0;
                    } else {
                        if (events.newListener) {
                            target.emit('newListener', type, listener.listener ? listener.listener : listener);
                            events = target._events;
                        }
                        existing = events[type];
                    }
                    if (!existing) {
                        existing = events[type] = listener;
                        ++target._eventsCount;
                    } else {
                        if (typeof existing === 'function') {
                            existing = events[type] = prepend ? [listener, existing] : [existing, listener];
                        } else {
                            if (prepend) {
                                existing.unshift(listener);
                            } else {
                                existing.push(listener);
                            }
                        }
                        if (!existing.warned) {
                            m = $getMaxListeners(target);
                            if (m && m > 0 && existing.length > m) {
                                existing.warned = true;
                                var w = new Error('Possible EventEmitter memory leak detected. ' +
                                        existing.length + ' "' + String(type) + '" listeners ' + 'added. Use emitter.setMaxListeners() to ' + 'increase limit.');
                                w.name = 'MaxListenersExceededWarning';
                                w.emitter = target;
                                w.type = type;
                                w.count = existing.length;
                                if (typeof console === 'object' && console.warn) {
                                    console.warn('%s: %s', w.name, w.message);
                                }
                            }
                        }
                    }
                    return target;
                }
                EventEmitter.prototype.addListener = function addListener(type, listener) {
                    return _addListener(this, type, listener, false);
                };
                EventEmitter.prototype.on = EventEmitter.prototype.addListener;
                EventEmitter.prototype.prependListener = function prependListener(type, listener) {
                    return _addListener(this, type, listener, true);
                };
                function onceWrapper() {
                    if (!this.fired) {
                        this.target.removeListener(this.type, this.wrapFn);
                        this.fired = true;
                        switch (arguments.length) {
                        case 0:
                            return this.listener.call(this.target);
                        case 1:
                            return this.listener.call(this.target, arguments[0]);
                        case 2:
                            return this.listener.call(this.target, arguments[0], arguments[1]);
                        case 3:
                            return this.listener.call(this.target, arguments[0], arguments[1], arguments[2]);
                        default:
                            var args = new Array(arguments.length);
                            for (var i = 0; i < args.length; ++i)
                                args[i] = arguments[i];
                            this.listener.apply(this.target, args);
                        }
                    }
                }
                function _onceWrap(target, type, listener) {
                    var state = {
                        fired: false,
                        wrapFn: undefined,
                        target: target,
                        type: type,
                        listener: listener
                    };
                    var wrapped = bind.call(onceWrapper, state);
                    wrapped.listener = listener;
                    state.wrapFn = wrapped;
                    return wrapped;
                }
                EventEmitter.prototype.once = function once(type, listener) {
                    if (typeof listener !== 'function')
                        throw new TypeError('"listener" argument must be a function');
                    this.on(type, _onceWrap(this, type, listener));
                    return this;
                };
                EventEmitter.prototype.prependOnceListener = function prependOnceListener(type, listener) {
                    if (typeof listener !== 'function')
                        throw new TypeError('"listener" argument must be a function');
                    this.prependListener(type, _onceWrap(this, type, listener));
                    return this;
                };
                EventEmitter.prototype.removeListener = function removeListener(type, listener) {
                    var list,
                    events,
                    position,
                    i,
                    originalListener;
                    if (typeof listener !== 'function')
                        throw new TypeError('"listener" argument must be a function');
                    events = this._events;
                    if (!events)
                        return this;
                    list = events[type];
                    if (!list)
                        return this;
                    if (list === listener || list.listener === listener) {
                        if (--this._eventsCount === 0)
                            this._events = objectCreate(null);
                        else {
                            delete events[type];
                            if (events.removeListener)
                                this.emit('removeListener', type, list.listener || listener);
                        }
                    } else if (typeof list !== 'function') {
                        position = -1;
                        for (i = list.length - 1; i >= 0; i--) {
                            if (list[i] === listener || list[i].listener === listener) {
                                originalListener = list[i].listener;
                                position = i;
                                break;
                            }
                        }
                        if (position < 0)
                            return this;
                        if (position === 0)
                            list.shift();
                        else
                            spliceOne(list, position);
                        if (list.length === 1)
                            events[type] = list[0];
                        if (events.removeListener)
                            this.emit('removeListener', type, originalListener || listener);
                    }
                    return this;
                };
                EventEmitter.prototype.removeAllListeners = function removeAllListeners(type) {
                    var listeners,
                    events,
                    i;
                    events = this._events;
                    if (!events)
                        return this;
                    if (!events.removeListener) {
                        if (arguments.length === 0) {
                            this._events = objectCreate(null);
                            this._eventsCount = 0;
                        } else if (events[type]) {
                            if (--this._eventsCount === 0)
                                this._events = objectCreate(null);
                            else
                                delete events[type];
                        }
                        return this;
                    }
                    if (arguments.length === 0) {
                        var keys = objectKeys(events);
                        var key;
                        for (i = 0; i < keys.length; ++i) {
                            key = keys[i];
                            if (key === 'removeListener')
                                continue;
                            this.removeAllListeners(key);
                        }
                        this.removeAllListeners('removeListener');
                        this._events = objectCreate(null);
                        this._eventsCount = 0;
                        return this;
                    }
                    listeners = events[type];
                    if (typeof listeners === 'function') {
                        this.removeListener(type, listeners);
                    } else if (listeners) {
                        for (i = listeners.length - 1; i >= 0; i--) {
                            this.removeListener(type, listeners[i]);
                        }
                    }
                    return this;
                };
                function _listeners(target, type, unwrap) {
                    var events = target._events;
                    if (!events)
                        return [];
                    var evlistener = events[type];
                    if (!evlistener)
                        return [];
                    if (typeof evlistener === 'function')
                        return unwrap ? [evlistener.listener || evlistener] : [evlistener];
                    return unwrap ? unwrapListeners(evlistener) : arrayClone(evlistener, evlistener.length);
                }
                EventEmitter.prototype.listeners = function listeners(type) {
                    return _listeners(this, type, true);
                };
                EventEmitter.prototype.rawListeners = function rawListeners(type) {
                    return _listeners(this, type, false);
                };
                EventEmitter.listenerCount = function (emitter, type) {
                    if (typeof emitter.listenerCount === 'function') {
                        return emitter.listenerCount(type);
                    } else {
                        return listenerCount.call(emitter, type);
                    }
                };
                EventEmitter.prototype.listenerCount = listenerCount;
                function listenerCount(type) {
                    var events = this._events;
                    if (events) {
                        var evlistener = events[type];
                        if (typeof evlistener === 'function') {
                            return 1;
                        } else if (evlistener) {
                            return evlistener.length;
                        }
                    }
                    return 0;
                }
                EventEmitter.prototype.eventNames = function eventNames() {
                    return this._eventsCount > 0 ? Reflect.ownKeys(this._events) : [];
                };
                function spliceOne(list, index) {
                    for (var i = index, k = i + 1, n = list.length; k < n; i += 1, k += 1)
                        list[i] = list[k];
                    list.pop();
                }
                function arrayClone(arr, n) {
                    var copy = new Array(n);
                    for (var i = 0; i < n; ++i)
                        copy[i] = arr[i];
                    return copy;
                }
                function unwrapListeners(arr) {
                    var ret = new Array(arr.length);
                    for (var i = 0; i < ret.length; ++i) {
                        ret[i] = arr[i].listener || arr[i];
                    }
                    return ret;
                }
                function objectCreatePolyfill(proto) {
                    var F = function () {};
                    F.prototype = proto;
                    return new F;
                }
                function objectKeysPolyfill(obj) {
                    var keys = [];
                    for (var k in obj)
                        if (Object.prototype.hasOwnProperty.call(obj, k)) {
                            keys.push(k);
                        }
                    return k;
                }
                function functionBindPolyfill(context) {
                    var fn = this;
                    return function () {
                        return fn.apply(context, arguments);
                    };
                }
            }, {}
        ],
        2: [function (require, module, exports) {
                'use strict';
                var token = '%[a-f0-9]{2}';
                var singleMatcher = new RegExp(token, 'gi');
                var multiMatcher = new RegExp('(' + token + ')+', 'gi');
                function decodeComponents(components, split) {
                    try {
                        return decodeURIComponent(components.join(''));
                    } catch (err) {}
                    if (components.length === 1) {
                        return components;
                    }
                    split = split || 1;
                    var left = components.slice(0, split);
                    var right = components.slice(split);
                    return Array.prototype.concat.call([], decodeComponents(left), decodeComponents(right));
                }
                function decode(input) {
                    try {
                        return decodeURIComponent(input);
                    } catch (err) {
                        var tokens = input.match(singleMatcher);
                        for (var i = 1; i < tokens.length; i++) {
                            input = decodeComponents(tokens, i).join('');
                            tokens = input.match(singleMatcher);
                        }
                        return input;
                    }
                }
                function customDecodeURIComponent(input) {
                    var replaceMap = {
                        '%FE%FF': '\uFFFD\uFFFD',
                        '%FF%FE': '\uFFFD\uFFFD'
                    };
                    var match = multiMatcher.exec(input);
                    while (match) {
                        try {
                            replaceMap[match[0]] = decodeURIComponent(match[0]);
                        } catch (err) {
                            var result = decode(match[0]);
                            if (result !== match[0]) {
                                replaceMap[match[0]] = result;
                            }
                        }
                        match = multiMatcher.exec(input);
                    }
                    replaceMap['%C2'] = '\uFFFD';
                    var entries = Object.keys(replaceMap);
                    for (var i = 0; i < entries.length; i++) {
                        var key = entries[i];
                        input = input.replace(new RegExp(key, 'g'), replaceMap[key]);
                    }
                    return input;
                }
                module.exports = function (encodedURI) {
                    if (typeof encodedURI !== 'string') {
                        throw new TypeError('Expected `encodedURI` to be of type `string`, got `' + typeof encodedURI + '`');
                    }
                    try {
                        encodedURI = encodedURI.replace(/\+/g, ' ');
                        return decodeURIComponent(encodedURI);
                    } catch (err) {
                        return customDecodeURIComponent(encodedURI);
                    }
                };
            }, {}
        ],
        3: [function (require, module, exports) {
                'use strict';
                const strictUriEncode = require('strict-uri-encode');
                const decodeComponent = require('decode-uri-component');
                const splitOnFirst = require('split-on-first');
                const isNullOrUndefined = value => value === null || value === undefined;
                function encoderForArrayFormat(options) {
                    switch (options.arrayFormat) {
                    case 'index':
                        return key => (result, value) => {
                            const index = result.length;
                            if (value === undefined || (options.skipNull && value === null) || (options.skipEmptyString && value === '')) {
                                return result;
                            }
                            if (value === null) {
                                return [...result, [encode(key, options), '[', index, ']'].join('')];
                            }
                            return [...result, [encode(key, options), '[', encode(index, options), ']=', encode(value, options)].join('')];
                        };
                    case 'bracket':
                        return key => (result, value) => {
                            if (value === undefined || (options.skipNull && value === null) || (options.skipEmptyString && value === '')) {
                                return result;
                            }
                            if (value === null) {
                                return [...result, [encode(key, options), '[]'].join('')];
                            }
                            return [...result, [encode(key, options), '[]=', encode(value, options)].join('')];
                        };
                    case 'comma':
                    case 'separator':
                        return key => (result, value) => {
                            if (value === null || value === undefined || value.length === 0) {
                                return result;
                            }
                            if (result.length === 0) {
                                return [[encode(key, options), '=', encode(value, options)].join('')];
                            }
                            return [[result, encode(value, options)].join(options.arrayFormatSeparator)];
                        };
                    default:
                        return key => (result, value) => {
                            if (value === undefined || (options.skipNull && value === null) || (options.skipEmptyString && value === '')) {
                                return result;
                            }
                            if (value === null) {
                                return [...result, encode(key, options)];
                            }
                            return [...result, [encode(key, options), '=', encode(value, options)].join('')];
                        };
                    }
                }
                function parserForArrayFormat(options) {
                    let result;
                    switch (options.arrayFormat) {
                    case 'index':
                        return (key, value, accumulator) => {
                            result = /\[(\d*)\]$/.exec(key);
                            key = key.replace(/\[\d*\]$/, '');
                            if (!result) {
                                accumulator[key] = value;
                                return;
                            }
                            if (accumulator[key] === undefined) {
                                accumulator[key] = {};
                            }
                            accumulator[key][result[1]] = value;
                        };
                    case 'bracket':
                        return (key, value, accumulator) => {
                            result = /(\[\])$/.exec(key);
                            key = key.replace(/\[\]$/, '');
                            if (!result) {
                                accumulator[key] = value;
                                return;
                            }
                            if (accumulator[key] === undefined) {
                                accumulator[key] = [value];
                                return;
                            }
                            accumulator[key] = [].concat(accumulator[key], value);
                        };
                    case 'comma':
                    case 'separator':
                        return (key, value, accumulator) => {
                            const isArray = typeof value === 'string' && value.split('').indexOf(options.arrayFormatSeparator) > -1;
                            const newValue = isArray ? value.split(options.arrayFormatSeparator).map(item => decode(item, options)) : value === null ? value : decode(value, options);
                            accumulator[key] = newValue;
                        };
                    default:
                        return (key, value, accumulator) => {
                            if (accumulator[key] === undefined) {
                                accumulator[key] = value;
                                return;
                            }
                            accumulator[key] = [].concat(accumulator[key], value);
                        };
                    }
                }
                function validateArrayFormatSeparator(value) {
                    if (typeof value !== 'string' || value.length !== 1) {
                        throw new TypeError('arrayFormatSeparator must be single character string');
                    }
                }
                function encode(value, options) {
                    if (options.encode) {
                        return options.strict ? strictUriEncode(value) : encodeURIComponent(value);
                    }
                    return value;
                }
                function decode(value, options) {
                    if (options.decode) {
                        return decodeComponent(value);
                    }
                    return value;
                }
                function keysSorter(input) {
                    if (Array.isArray(input)) {
                        return input.sort();
                    }
                    if (typeof input === 'object') {
                        return keysSorter(Object.keys(input)).sort((a, b) => Number(a) - Number(b)).map(key => input[key]);
                    }
                    return input;
                }
                function removeHash(input) {
                    const hashStart = input.indexOf('#');
                    if (hashStart !== -1) {
                        input = input.slice(0, hashStart);
                    }
                    return input;
                }
                function getHash(url) {
                    let hash = '';
                    const hashStart = url.indexOf('#');
                    if (hashStart !== -1) {
                        hash = url.slice(hashStart);
                    }
                    return hash;
                }
                function extract(input) {
                    input = removeHash(input);
                    const queryStart = input.indexOf('?');
                    if (queryStart === -1) {
                        return '';
                    }
                    return input.slice(queryStart + 1);
                }
                function parseValue(value, options) {
                    if (options.parseNumbers && !Number.isNaN(Number(value)) && (typeof value === 'string' && value.trim() !== '')) {
                        value = Number(value);
                    } else if (options.parseBooleans && value !== null && (value.toLowerCase() === 'true' || value.toLowerCase() === 'false')) {
                        value = value.toLowerCase() === 'true';
                    }
                    return value;
                }
                function parse(input, options) {
                    options = Object.assign({
                        decode: true,
                        sort: true,
                        arrayFormat: 'none',
                        arrayFormatSeparator: ',',
                        parseNumbers: false,
                        parseBooleans: false
                    }, options);
                    validateArrayFormatSeparator(options.arrayFormatSeparator);
                    const formatter = parserForArrayFormat(options);
                    const ret = Object.create(null);
                    if (typeof input !== 'string') {
                        return ret;
                    }
                    input = input.trim().replace(/^[?#&]/, '');
                    if (!input) {
                        return ret;
                    }
                    for (const param of input.split('&')) {
                        let[key, value] = splitOnFirst(options.decode ? param.replace(/\+/g, ' ') : param, '=');
                        value = value === undefined ? null : ['comma', 'separator'].includes(options.arrayFormat) ? value : decode(value, options);
                        formatter(decode(key, options), value, ret);
                    }
                    for (const key of Object.keys(ret)) {
                        const value = ret[key];
                        if (typeof value === 'object' && value !== null) {
                            for (const k of Object.keys(value)) {
                                value[k] = parseValue(value[k], options);
                            }
                        } else {
                            ret[key] = parseValue(value, options);
                        }
                    }
                    if (options.sort === false) {
                        return ret;
                    }
                    return (options.sort === true ? Object.keys(ret).sort() : Object.keys(ret).sort(options.sort)).reduce((result, key) => {
                        const value = ret[key];
                        if (Boolean(value) && typeof value === 'object' && !Array.isArray(value)) {
                            result[key] = keysSorter(value);
                        } else {
                            result[key] = value;
                        }
                        return result;
                    }, Object.create(null));
                }
                exports.extract = extract;
                exports.parse = parse;
                exports.stringify = (object, options) => {
                    if (!object) {
                        return '';
                    }
                    options = Object.assign({
                        encode: true,
                        strict: true,
                        arrayFormat: 'none',
                        arrayFormatSeparator: ','
                    }, options);
                    validateArrayFormatSeparator(options.arrayFormatSeparator);
                    const shouldFilter = key => ((options.skipNull && isNullOrUndefined(object[key])) || (options.skipEmptyString && object[key] === ''));
                    const formatter = encoderForArrayFormat(options);
                    const objectCopy = {};
                    for (const key of Object.keys(object)) {
                        if (!shouldFilter(key)) {
                            objectCopy[key] = object[key];
                        }
                    }
                    const keys = Object.keys(objectCopy);
                    if (options.sort !== false) {
                        keys.sort(options.sort);
                    }
                    return keys.map(key => {
                        const value = object[key];
                        if (value === undefined) {
                            return '';
                        }
                        if (value === null) {
                            return encode(key, options);
                        }
                        if (Array.isArray(value)) {
                            return value.reduce(formatter(key), []).join('&');
                        }
                        return encode(key, options) + '=' + encode(value, options);
                    }).filter(x => x.length > 0).join('&');
                };
                exports.parseUrl = (input, options) => {
                    return {
                        url: removeHash(input).split('?')[0] || '',
                        query: parse(extract(input), options)
                    };
                };
                exports.stringifyUrl = (input, options) => {
                    const url = removeHash(input.url).split('?')[0] || '';
                    const queryFromUrl = exports.extract(input.url);
                    const parsedQueryFromUrl = exports.parse(queryFromUrl);
                    const hash = getHash(input.url);
                    const query = Object.assign(parsedQueryFromUrl, input.query);
                    let queryString = exports.stringify(query, options);
                    if (queryString) {
                        queryString = `?${queryString}`;
                    }
                    return `${url}${queryString}${hash}`;
                };
            }, {
                "decode-uri-component": 2,
                "split-on-first": 4,
                "strict-uri-encode": 5
            }
        ],
        4: [function (require, module, exports) {
                'use strict';
                module.exports = (string, separator) => {
                    if (!(typeof string === 'string' && typeof separator === 'string')) {
                        throw new TypeError('Expected the arguments to be of type `string`');
                    }
                    if (separator === '') {
                        return [string];
                    }
                    const separatorIndex = string.indexOf(separator);
                    if (separatorIndex === -1) {
                        return [string];
                    }
                    return [string.slice(0, separatorIndex), string.slice(separatorIndex + separator.length)];
                };
            }, {}
        ],
        5: [function (require, module, exports) {
                'use strict';
                module.exports = str => encodeURIComponent(str).replace(/[!'()*]/g, x => `%${x.charCodeAt(0).toString(16).toUpperCase()}`);
            }, {}
        ],
        6: [function (require, module, exports) {
                "use strict";
                Object.defineProperty(exports, "__esModule", {
                    value: true
                });
                exports.getCSS = getCSS;
                function getCSS(themeColor, height, width) {
                    return `

/* Modal Content/Box */

.transak_close {

    float: right;

      animation: 5s transak_fadeIn;

      animation-fill-mode: forwards;

      visibility: hidden;

    transition: 0.5s;

    position: absolute;

    right: -5px;

    width: 35px;

    margin-top: -15px;

    height: 35px;

    font-weight: bold;

    z-index: 1;

    background: white;

    color: #${themeColor};

    border-radius: 50%;

}



@keyframes transak_fadeIn {

  0% {

    opacity: 0;

  }

  50% {

   visibility: hidden;

    opacity: 0;

  }

  100% {

    visibility: visible;

    opacity: 1;

  }

}



.transak_close:hover,

.transak_close:focus {

  color: white;

  background: #${themeColor};

  text-decoration: none;

  cursor: pointer;

}



.transak_modal {

  display: block;

  width: ${width};

  max-width: 500px;

  height: ${height};

  max-height: 100%;

  position: fixed;

  z-index: 100;

  left: 50%;

  top: 50%;

  transform: translate(-50%, -50%);

  background: white;

      border: none;

    border-radius: 2%;

    margin: 0px auto;

    display: block;

 overflow: hidden;

}

.transak_closed {

  display: none;

}



#transakOnOffRampWidget{

 min-height: ${height}; 

    position: absolute; 

    border: none; 

    border-radius: 2%; 

    margin: 0px auto; 

    display: block;

}



.transak_modal-overlay {

  position: fixed;

  top: 0;

  left: 0;

  width: 100%;

  height: 100%;

  z-index: 50;

  

  background: rgba(0, 0, 0, 0.6);

}



.transak_modal-content{

  width: 100%;

  height: 100%;

  overflow: hidden;

}



.transak_modal .close-button {

  position: absolute;

  z-index: 1;

  top: 10px;

  right: 20px;

  background: black;

  color: white;

  padding: 5px 10px;

  font-size: 1.3rem;

}



.transak_transakContainer{

    height: 100%;

    width:100%;

}



#transakFiatOnOffRamp{

    margin-left: 10px;

    margin-right: 10px;

}





@media all and (max-width: ${width}) {

  .transak_modal {

    height: 100%;

    max-height:${height};

    top: 53%;

  }

}



@media all and (max-height: ${height}) and (max-width: ${width}) {

    #transakOnOffRampWidget{

    padding-bottom: 15px;

    }

}

`;
                }
            }, {}
        ],
        7: [function (require, module, exports) {
                "use strict";
                Object.defineProperty(exports, "__esModule", {
                    value: true
                });
                exports.closeSVGIcon = void 0;
                let closeSVGIcon = `<svg version="1.1" fill="currentColor" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

\t viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">

<g>

\t<g id="_x31_0_23_">

\t\t<g>

\t\t\t<path d="M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306c168.988,0,306-137.012,306-306S475.008,0,306,0z M414.19,387.147

\t\t\t\tc7.478,7.478,7.478,19.584,0,27.043c-7.479,7.478-19.584,7.478-27.043,0l-81.032-81.033l-81.588,81.588

\t\t\t\tc-7.535,7.516-19.737,7.516-27.253,0c-7.535-7.535-7.535-19.737,0-27.254l81.587-81.587l-81.033-81.033

\t\t\t\tc-7.478-7.478-7.478-19.584,0-27.042c7.478-7.478,19.584-7.478,27.042,0l81.033,81.033l82.181-82.18

\t\t\t\tc7.535-7.535,19.736-7.535,27.253,0c7.535,7.535,7.535,19.737,0,27.253l-82.181,82.181L414.19,387.147z"/>

\t\t</g>

\t</g>

</g>

</svg>`;
                exports.closeSVGIcon = closeSVGIcon;
            }, {}
        ],
        8: [function (require, module, exports) {
                "use strict";
                Object.defineProperty(exports, "__esModule", {
                    value: true
                });
                exports.default = void 0;
                var _default = {
                    SOMETHING_WRONG: `[Transak SDK] => Oops something went wrong please try again. Contact us at hello@transak.com`,
                    ENTER_API_KEY: `[Transak SDK] => Please enter your API Key`,
                    NOT_INITIALIZED_PROPERLY: `[Transak SDK] => Transak SDK is not initialized properly`
                };
                exports.default = _default;
            }, {}
        ],
        9: [function (require, module, exports) {
                "use strict";
                Object.defineProperty(exports, "__esModule", {
                    value: true
                });
                exports.default = void 0;
                var _default = {
                    TRANSAK_WIDGET_INITIALISED: 'TRANSAK_WIDGET_INITIALISED',
                    TRANSAK_WIDGET_OPEN: 'TRANSAK_WIDGET_OPEN',
                    TRANSAK_WIDGET_CLOSE_REQUEST: 'TRANSAK_WIDGET_CLOSE_REQUEST',
                    TRANSAK_WIDGET_CLOSE: 'TRANSAK_WIDGET_CLOSE',
                    TRANSAK_ORDER_CREATED: 'TRANSAK_ORDER_CREATED',
                    TRANSAK_ORDER_CANCELLED: 'TRANSAK_ORDER_CANCELLED',
                    TRANSAK_ORDER_FAILED: 'TRANSAK_ORDER_FAILED',
                    TRANSAK_ORDER_SUCCESSFUL: 'TRANSAK_ORDER_SUCCESSFUL'
                };
                exports.default = _default;
            }, {}
        ],
        10: [function (require, module, exports) {
                "use strict";
                Object.defineProperty(exports, "__esModule", {
                    value: true
                });
                exports.default = void 0;
                var _default = {
                    ENVIRONMENT: {
                        STAGING: {
                            FRONTEND: 'https://staging-global.transak.com',
                            BACKEND: 'https://staging-api.transak.com/api/v1',
                            NAME: 'STAGING'
                        },
                        DEVELOPMENT: {
                            FRONTEND: 'http://localhost:3000',
                            BACKEND: 'http://localhost:8292/api/v1',
                            NAME: 'DEVELOPMENT'
                        },
                        PRODUCTION: {
                            FRONTEND: 'https://global.transak.com',
                            BACKEND: 'https://api.transak.com/api/v1',
                            NAME: 'PRODUCTION'
                        }
                    },
                    STATUS: {
                        INIT: 'init',
                        TRANSAK_INITIALISED: 'transak_initialised'
                    }
                };
                exports.default = _default;
            }, {}
        ],
        11: [function (require, module, exports) {
                "use strict";
                Object.defineProperty(exports, "__esModule", {
                    value: true
                });
                Object.defineProperty(exports, "config", {
                    enumerable: true,
                    get: function () {
                        return _globalConfig.default;
                    }
                });
                Object.defineProperty(exports, "errorsLang", {
                    enumerable: true,
                    get: function () {
                        return _errors.default;
                    }
                });
                Object.defineProperty(exports, "EVENTS", {
                    enumerable: true,
                    get: function () {
                        return _events.default;
                    }
                });
                var _globalConfig = _interopRequireDefault(require("./globalConfig"));
                var _errors = _interopRequireDefault(require("./errors"));
                var _events = _interopRequireDefault(require("./events"));
                function _interopRequireDefault(obj) {
                    return obj && obj.__esModule ? obj : {
                    default:
                        obj
                    };
                }
            }, {
                "./errors": 8,
                "./events": 9,
                "./globalConfig": 10
            }
        ],
        12: [function (require, module, exports) {
                "use strict";
                Object.defineProperty(exports, "__esModule", {
                    value: true
                });
                exports.default = void 0;
                var _events = _interopRequireDefault(require("events"));
                var _constants = require("./constants");
                var _generalUtil = require("./utils/generalUtil");
                var _svg = require("./assets/svg");
                var _css = require("./assets/css");
                var _queryString = _interopRequireDefault(require("query-string"));
                function _interopRequireDefault(obj) {
                    return obj && obj.__esModule ? obj : {
                    default:
                        obj
                    };
                }
                const eventEmitter = new _events.default.EventEmitter();
                function TransakSDK(partnerData) {
                    this.partnerData = partnerData;
                    this.isInitialised = false;
                    this.EVENTS = _constants.EVENTS;
                    this.ALL_EVENTS = '*';
                    this.ERROR = 'TRANSAK_ERROR';
                }
                TransakSDK.prototype.on = function (type, cb) {
                    if (type === this.ALL_EVENTS) {
                        for (let eventName in _constants.EVENTS) {
                            eventEmitter.on(_constants.EVENTS[eventName], cb);
                        }
                    }
                    if (_constants.EVENTS[type])
                        eventEmitter.on(type, cb);
                    if (type === this.ERROR)
                        eventEmitter.on(this.ERROR, cb);
                };
                TransakSDK.prototype.init = function () {
                    this.modal(this);
                };
                TransakSDK.prototype.close = async function () {
                    let modal = document.getElementById("transakFiatOnOffRamp");
                    if (modal && modal.style) {
                        modal.style.display = "none";
                        modal.innerHTML = "";
                        await modal.remove();
                    }
                };
                TransakSDK.prototype.closeRequest = function () {
                    let iframeEl = document.getElementById('transakOnOffRampWidget');
                    if (iframeEl)
                        iframeEl.contentWindow.postMessage({
                            event_id: _constants.EVENTS.TRANSAK_WIDGET_CLOSE_REQUEST,
                            data: true
                        }, '*');
                };
                TransakSDK.prototype.modal = async function () {
                    try {
                        if (this.partnerData) {
                            let {
                                url,
                                width,
                                height,
                                partnerData
                            } = await generateURL(this.partnerData);
                            let wrapper = document.createElement('div');
                            wrapper.id = "transakFiatOnOffRamp";
                            wrapper.innerHTML = `<div class="transak_modal-overlay" id="transak_modal-overlay"></div><div class="transak_modal" id="transak_modal"><div class="transak_modal-content"><div class="transakContainer"><iframe id="transakOnOffRampWidget" src="${url}" style="width: ${width}; height: ${height}"></iframe></div></div></div>`;
                            let container = document.getElementsByTagName("body");
                            if (!container)
                                container = document.getElementsByTagName("html");
                            if (!container)
                                container = document.getElementsByTagName("div");
                            await container[0].appendChild(wrapper);
                            await setStyle(this.partnerData.themeColor, width, height);
                            let modal = document.getElementById("transakFiatOnOffRamp");
                            let span = document.getElementsByClassName("transak_close")[0];
                            document.documentElement.style.overflow = 'hidden';
                            document.body.scroll = "no";
                            if (modal && modal.style)
                                modal.style.display = "block";
                            this.isInitialised = true;
                            eventEmitter.emit(_constants.EVENTS.TRANSAK_WIDGET_INITIALISED, {
                                status: true,
                                eventName: _constants.EVENTS.TRANSAK_WIDGET_INITIALISED
                            });
                            span.onclick = () => {
                                return this.closeRequest();
                            };
                            window.onclick = event => {
                                if (event.target === document.getElementById("transak_modal-overlay"))
                                    this.closeRequest();
                            };
                            if (window.addEventListener)
                                window.addEventListener("message", handleMessage);
                            else
                                window.attachEvent("onmessage", handleMessage);
                        }
                    } catch (e) {
                        throw e;
                    }
                };
                async function generateURL(configData) {
                    let partnerData = {},
                    environment = 'development',
                    queryString = "",
                    width = "100%",
                    height = "100%";
                    if (configData) {
                        if (configData.apiKey) {
                            if (configData.environment) {
                                if (_constants.config.ENVIRONMENT[configData.environment])
                                    environment = _constants.config.ENVIRONMENT[configData.environment].NAME;
                            }
                            try {
                                environment = environment.toUpperCase();
                                partnerData.apiKey = configData.apiKey;
                                if (configData.cryptoCurrencyCode)
                                    partnerData.cryptoCurrencyCode = configData.cryptoCurrencyCode;
                                if (configData.defaultCryptoCurrency)
                                    partnerData.defaultCryptoCurrency = configData.defaultCryptoCurrency;
                                if (configData.walletAddress)
                                    partnerData.walletAddress = configData.walletAddress;
                                if (configData.themeColor)
                                    partnerData.themeColor = configData.themeColor.replace("#", "");
                                if (configData.walletAddress)
                                    partnerData.walletAddress = configData.walletAddress;
                                if (configData.fiatAmount)
                                    partnerData.fiatAmount = configData.fiatAmount;
                                if (configData.walletAddressesData && (configData.walletAddressesData.networks || configData.walletAddressesData.coins)) {
                                    partnerData.walletAddressesData = {};
                                    if (configData.walletAddressesData.networks)
                                        partnerData.walletAddressesData.networks = configData.walletAddressesData.networks;
                                    if (configData.walletAddressesData.coins)
                                        partnerData.walletAddressesData.coins = configData.walletAddressesData.coins;
                                    partnerData.walletAddressesData = JSON.stringify(partnerData.walletAddressesData);
                                }
                                if (configData.fiatCurrency)
                                    partnerData.fiatCurrency = configData.fiatCurrency;
                                if (configData.countryCode)
                                    partnerData.countryCode = configData.countryCode;
                                if (configData.paymentMethod)
                                    partnerData.paymentMethod = configData.paymentMethod;
                                if (configData.defaultPaymentMethod)
                                    partnerData.defaultPaymentMethod = configData.defaultPaymentMethod;
                                if (configData.isAutoFillUserData)
                                    partnerData.isAutoFillUserData = configData.isAutoFillUserData;
                                if (configData.isFeeCalculationHidden)
                                    partnerData.isFeeCalculationHidden = configData.isFeeCalculationHidden;
                                if (configData.disablePaymentMethods)
                                    partnerData.disablePaymentMethods = configData.disablePaymentMethods;
                                if (configData.email)
                                    partnerData.email = configData.email;
                                if (configData.userData)
                                    partnerData.userData = JSON.stringify(configData.userData);
                                if (configData.partnerOrderId)
                                    partnerData.partnerOrderId = configData.partnerOrderId;
                                if (configData.partnerCustomerId)
                                    partnerData.partnerCustomerId = configData.partnerCustomerId;
                                if (configData.exchangeScreenTitle)
                                    partnerData.exchangeScreenTitle = configData.exchangeScreenTitle;
                                if (configData.hideMenu)
                                    partnerData.hideMenu = configData.hideMenu;
                                if (configData.accessToken)
                                    partnerData.accessToken = configData.accessToken;
                                if (configData.hideExchangeScreen)
                                    partnerData.hideExchangeScreen = configData.hideExchangeScreen;
                                if (configData.isDisableCrypto)
                                    partnerData.isDisableCrypto = configData.isDisableCrypto;
                                if (configData.redirectURL)
                                    partnerData.redirectURL = configData.redirectURL;
                                if (configData.hostURL)
                                    partnerData.hostURL = configData.hostURL ? configData.hostURL : window.location.origin;
                                if (configData.disableWalletAddressForm)
                                    partnerData.disableWalletAddressForm = configData.disableWalletAddressForm;
                                if (configData.cryptoCurrencyList)
                                    partnerData.cryptoCurrencyList = configData.cryptoCurrencyList.split(',');
                                queryString = _queryString.default.stringify(partnerData, {
                                    arrayFormat: 'comma'
                                });
                            } catch (e) {
                                throw e;
                            }
                        } else
                            throw _constants.errorsLang.ENTER_API_KEY;
                        if (configData.widgetWidth)
                            width = configData.widgetWidth;
                        if (configData.widgetHeight)
                            height = configData.widgetHeight;
                    }
                    return {
                        width,
                        height,
                        partnerData,
                        url: `${_constants.config.ENVIRONMENT[environment].FRONTEND}?${queryString}`
                    };
                }
                async function setStyle(themeColor, width, height) {
                    let style = await document.createElement('style');
                    style.innerHTML = (0, _css.getCSS)(themeColor, height, width);
                    let modal = document.getElementById("transakFiatOnOffRamp");
                    if (modal)
                        await modal.appendChild(style);
                }
                function handleMessage(event) {
                    let environment;
                    if (event.origin === _constants.config.ENVIRONMENT.DEVELOPMENT.FRONTEND)
                        environment = _constants.config.ENVIRONMENT.DEVELOPMENT.NAME;
                    else if (event.origin === _constants.config.ENVIRONMENT.PRODUCTION.FRONTEND)
                        environment = _constants.config.ENVIRONMENT.PRODUCTION.NAME;
                    else if (event.origin === _constants.config.ENVIRONMENT.STAGING.FRONTEND)
                        environment = _constants.config.ENVIRONMENT.STAGING.NAME;
                    if (environment) {
                        if (event && event.data && event.data.event_id) {
                            switch (event.data.event_id) {
                            case _constants.EVENTS.TRANSAK_WIDGET_CLOSE: {
                                    eventEmitter.emit(_constants.EVENTS.TRANSAK_WIDGET_CLOSE, {
                                        status: true,
                                        eventName: _constants.EVENTS.TRANSAK_WIDGET_CLOSE
                                    });
                                    document.documentElement.style.overflow = 'hidden';
                                    document.body.scroll = "no";
                                    let modal = document.getElementById("transakFiatOnOffRamp");
                                    if (modal && modal.style) {
                                        modal.style.display = "none";
                                        modal.innerHTML = "";
                                        modal.remove();
                                    }
                                    break;
                                }
                            case _constants.EVENTS.TRANSAK_ORDER_CREATED: {
                                    eventEmitter.emit(_constants.EVENTS.TRANSAK_ORDER_CREATED, {
                                        status: event.data.data,
                                        eventName: _constants.EVENTS.TRANSAK_ORDER_CREATED
                                    });
                                    break;
                                }
                            case _constants.EVENTS.TRANSAK_ORDER_CANCELLED: {
                                    eventEmitter.emit(_constants.EVENTS.TRANSAK_ORDER_CANCELLED, {
                                        status: event.data.data,
                                        eventName: _constants.EVENTS.TRANSAK_ORDER_CANCELLED
                                    });
                                    break;
                                }
                            case _constants.EVENTS.TRANSAK_ORDER_FAILED: {
                                    eventEmitter.emit(_constants.EVENTS.TRANSAK_ORDER_FAILED, {
                                        status: event.data.data,
                                        eventName: _constants.EVENTS.TRANSAK_ORDER_FAILED
                                    });
                                    break;
                                }
                            case _constants.EVENTS.TRANSAK_ORDER_SUCCESSFUL: {
                                    eventEmitter.emit(_constants.EVENTS.TRANSAK_ORDER_SUCCESSFUL, {
                                        status: event.data.data,
                                        eventName: _constants.EVENTS.TRANSAK_ORDER_SUCCESSFUL
                                    });
                                    break;
                                }
                            case _constants.EVENTS.TRANSAK_WIDGET_OPEN: {
                                    eventEmitter.emit(_constants.EVENTS.TRANSAK_WIDGET_OPEN, {
                                        status: true,
                                        eventName: _constants.EVENTS.TRANSAK_WIDGET_OPEN
                                    });
                                    break;
                                }
                            default: {}
                            }
                        }
                    }
                }
                var _default = TransakSDK;
                exports.default = _default;
            }, {
                "./assets/css": 6,
                "./assets/svg": 7,
                "./constants": 11,
                "./utils/generalUtil": 13,
                "events": 1,
                "query-string": 3
            }
        ],
        13: [function (require, module, exports) {
                "use strict";
                Object.defineProperty(exports, "__esModule", {
                    value: true
                });
                exports.UrlEncode = UrlEncode;
                exports.default = void 0;
                function UrlEncode(data, encodeornot) {
                    if (typeof data == 'object') {
                        let out = [];
                        for (let key in data) {
                            out.push(key + '=' + (encodeornot ? encodeURIComponent(data[key]) : data[key]));
                        }
                        let finalStr = out.join('&');
                        return finalStr;
                    } else {
                        console.warn('error occur');
                    }
                };
                var _default = {
                    UrlEncode
                };
                exports.default = _default;
            }, {}
        ]
    }, {}, [12])(12)
});

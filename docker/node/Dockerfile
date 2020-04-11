ARG NODE_VERSION
FROM node:$NODE_VERSION

# Set working directory
WORKDIR /usr/src/app

# Create node user with correct uid
ARG UID
ARG GID

RUN deluser node && \
    if getent group node; then delgroup node; fi && \
    addgroup -S -g ${GID} node && \
    adduser -D -u ${UID} -G node node && \
    chown -R node /usr/src/app

USER node

RUN mkdir -p /home/node/.npm-global
RUN npm config set prefix "/home/node/.npm-global"
ENV PATH="/home/node/.npm-global/bin:${PATH}"

# Copy package or yarn files if exists
COPY ./app/package.json ./app/package*.json ./app/yarn*.json ./
# install global packages
RUN npm i -g nodemon --quiet --no-progress
# Install initial package
RUN npm install --quiet --no-progress

CMD [ "nodemon", "./server/server.js" ]

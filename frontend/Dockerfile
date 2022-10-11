FROM node:alpine

WORKDIR /app/frontend

COPY package.json ./
COPY package-lock.json ./

COPY ./ ./

CMD ["npm", "start"]

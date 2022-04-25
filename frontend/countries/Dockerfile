# ! Image
# FROM node:14-alpine

# # ? Set Working Directory
# WORKDIR /

# # * Install PM2 to serve the app
# RUN npm install pm2 -g

# # ? Serve the application on start
# CMD command pm2 serve ./ 4200 --spa --watch && pm2 log


#stage 1
FROM node:latest as node
WORKDIR /app
COPY . .
RUN npm install
RUN npm run build
#stage 2
FROM nginx:alpine
COPY --from=node /app/dist/countries /usr/share/nginx/html

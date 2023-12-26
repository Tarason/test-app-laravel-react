FROM node:18
WORKDIR /app
COPY frontend/package*.json frontend/yarn.lock* ./
RUN npm install --frozen-lockfile
COPY frontend/ .
RUN npm run build
EXPOSE 3000

CMD ["npm", "start"]

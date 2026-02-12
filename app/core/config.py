from pydantic_settings import BaseSettings, SettingsConfigDict
from dotenv import load_dotenv

load_dotenv()

class Settings(BaseSettings):
    
    model_config = SettingsConfigDict(env_file='.env',extra="ignore")
    
    DB_USER : str
    DB_PASSWORD : str
    DB_HOST : str
    DB_PORT : str
    DB_NAME : str
    
    model_config = SettingsConfigDict(
        env_file=".env",
        extra="ignore"
    )
    @property
    
    def DATABASE_URL(self) ->str :
        return f"postgresql+asyncpg://{self.DB_USER}:{self.DB_PASSWORD}@{self.DB_HOST}:{self.DB_PORT}/{self.DB_NAME}"
    #DATABASE_URL=
    SECRET_KEY : str
    ALGORITHM : str
    ACCESS_TOKEN_EXPIRE_MINUTES : int
    
settings = Settings()
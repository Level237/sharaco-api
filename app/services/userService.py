from sqlmodel import Session,select
from app.models.user import User
from app.core.security import get_password_hash

class UserService:
    @staticmethod

    def create_user(db:Session,email:str,password:str)->User:

        hashed_pwd = get_password_hash(password)
        db_user = User(email=email,hashed_password=hashed_pwd)
        db.add(db_user)
        db.commit()
        db.refresh(db_user)
        return db_user

    @staticmethod

    async def get_by_email(db:Session,email:str)-> User | None:
        statement = select(User).where(User.email == email)
        result = await db.execute(statement)
        return result.scalar_one_or_none()